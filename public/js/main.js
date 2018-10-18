var patch = window.location.pathname;

var active = document.querySelector('[href="' + patch + '"]');

if(patch !== '/'){
    active.className = 'active';
}
