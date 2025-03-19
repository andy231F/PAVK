function toggle() {
    
    if (!document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.add('dark');
        document.cookie = "darkmode=true";
    } else {
        document.documentElement.classList.remove('dark');
        document.cookie = "darkmode=false";
    }
    moveRond();
}

function moveRond(){
    const toggler = document.querySelector('.rondThemeToggler');
    if (!document.documentElement.classList.contains('dark')) {
        toggler.classList.remove('translate-x-5');
    }else{
        toggler.classList.add('translate-x-5');
    }
}

moveRond();
