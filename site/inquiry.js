'use strict';
const form = document.getElementById('inquiry');
const result = document.getElementById('result');
const download = document.getElementById('download');
let summary = '';
document.querySelectorAll('[data-goal]').forEach(link => link.addEventListener('click', () => {
  document.getElementById('goal').value = link.dataset.goal;
  invalidate();
}));
function invalidate() {
  summary = '';
  download.hidden = true;
  result.textContent = '';
}
form.addEventListener('change', invalidate);
form.addEventListener('reset', invalidate);
form.addEventListener('submit', event => {
  event.preventDefault();
  if (!form.reportValidity()) return;
  summary = ['Mad Mallard Personal Training — consultation preparation', ...['goal','experience','equipment','schedule'].map(id => document.querySelector('label[for="'+id+'"]').textContent + ': ' + document.getElementById(id).value)].join('\n');
  result.textContent = summary + '\n\nNothing has been sent or stored by this website. Save this summary for your future consultation.';
  download.hidden = false;
});
download.addEventListener('click', () => {
  if (!summary) return;
  const url = URL.createObjectURL(new Blob([summary+'\n'], {type:'text/plain;charset=utf-8'}));
  const link = document.createElement('a');
  link.href = url;
  link.download = 'mad-mallard-training-inquiry.txt';
  document.body.append(link);
  link.click();
  link.remove();
  setTimeout(() => URL.revokeObjectURL(url), 1000);
});
