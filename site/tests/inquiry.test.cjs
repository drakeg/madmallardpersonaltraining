'use strict';
// Dependency-free DOM contract regression test; not a real browser test.
const assert = require('node:assert/strict');
const {readFileSync} = require('node:fs');
const vm = require('node:vm');
const path = require('node:path');
const elements = Object.fromEntries(['inquiry','result','download','goal','experience','equipment','schedule'].map(id => [id,{value:'',textContent:'',hidden:id==='download',events:{},addEventListener(type,fn){this.events[type]=fn;}}]));
const form = elements.inquiry;
form.reportValidity = () => ['goal','experience','equipment','schedule'].every(id=>elements[id].value);
const choice = {dataset:{goal:'Build strength'},addEventListener(type,fn){this.click=fn;}};
let exported = null, clicked = false;
const document = {getElementById:id=>elements[id],querySelectorAll:()=>[choice],querySelector:s=>({textContent:s.split('"')[1]}),createElement:()=>({click(){clicked=true;},remove(){}}),body:{append(){}}};
vm.runInNewContext(readFileSync(path.join(__dirname,'../inquiry.js'),'utf8'),{document,Blob,URL:{createObjectURL(blob){exported=blob;return 'blob:test';},revokeObjectURL(){}},setTimeout:fn=>fn()});
const submit=()=>form.events.submit({preventDefault(){}});
(async()=>{
  submit(); assert.equal(elements.download.hidden,true);
  choice.click(); assert.equal(elements.goal.value,'Build strength');
  elements.experience.value='Beginner'; elements.equipment.value='Gym access'; elements.schedule.value='1–2 days';
  submit(); assert.equal(elements.download.hidden,false); assert.match(elements.result.textContent,/Nothing has been sent/);
  elements.download.events.click(); assert.equal(clicked,true); assert.match(await exported.text(),/Build strength/);
  form.events.change(); assert.equal(elements.download.hidden,true); assert.equal(elements.result.textContent,'');
  submit(); form.events.reset(); assert.equal(elements.download.hidden,true); assert.equal(elements.result.textContent,'');
  clicked=false; elements.download.events.click(); assert.equal(clicked,false);
  console.log('Consultation interaction checks passed');
})().catch(error=>{console.error(error);process.exitCode=1;});
