document.addEventListener('DOMContentLoaded', function(){
  var flag = document.getElementById('success-flag');
  if (!flag) return;

  var username = flag.getAttribute('data-username') || '';
  var modal = document.getElementById('success-modal');
  var msg = document.getElementById('modal-message');
  var closeBtn = document.getElementById('modal-close');

  if (!modal || !msg || !closeBtn) return;

  msg.textContent = username ? ('Successfully submitted. Hello, ' + username + '!') : 'Successfully submitted!';
  modal.style.display = 'block';

  closeBtn.addEventListener('click', function(){ modal.style.display = 'none'; });
  modal.addEventListener('click', function(e){ if (e.target === modal) modal.style.display = 'none'; });
});
