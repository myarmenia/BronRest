setTimeout(() => {
    document.querySelector('.notify').remove()
    window.history.pushState("", "Tap-Table", "/");
}, 2000)