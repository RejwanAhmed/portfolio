// Typing Script JS
let typed1 = new Typed(".typing",{
    strings: ["Web Developer", "Front-end developer", "Backend developer"],
    typeSpeed: 80,
    backSpeed: 80,
});

let typed2 = new Typed(".typing-2",{
    strings: ["Web Developer", "Front-end developer", "Backend developer"],
    typeSpeed: 100,
    backSpeed: 60,
});


//Show/hide nav menu
const menu = document.querySelector('.nav_menu');
const menuBtn = document.querySelector('#open-menu-btn');
const closeBtn = document.querySelector('#close-menu-btn');

menuBtn.addEventListener('click', () => {
    menu.style.display = "flex";
    closeBtn.style.display = "inline-block";
    menuBtn.style.display = "none";
})

//close nav menu
const closeNav = () => {
    menu.style.display = "none";
    closeBtn.style.display = "none";
    menuBtn.style.display = "inline-block";
}
closeBtn.addEventListener('click', closeNav);

//nav color change on scroll
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY>100);
})

// Slider

// Modal
/*--===== Open Clicked Modal =====--*/
const modals = document.querySelectorAll('.modal');
const cardBtns = document.querySelectorAll('.card_btn');
const closeBtns = document.querySelectorAll('.close_btn');

const openModal = (index) => {
    modals[index].classList.add('open');
};

const closeModal = (index) => {
    modals[index].classList.remove('open');
};


// opening the clicked Modal.
cardBtns.forEach((currCardBtn, index) => {
    currCardBtn.addEventListener('click', () => {
        openModal(index);
    });
});


// closing the current opened Modal.
closeBtns.forEach((currCloseBtn, index) => {
    currCloseBtn.addEventListener('click', () => {
        closeModal(index);
    });
});


// closing the current opened Modal on clicking outside.
window.addEventListener('click', (e) => {
    if (e.target.className === 'modal_wrapper') {
        modals.forEach((currModal) => {
            currModal.classList.remove('open');
        });
    }
});

// Get Current Year
const currentYear = document.querySelector('#current_year');
currentYear.innerHTML = new Date().getFullYear();
