//CONTROLE LOGIN
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');


registerLink.addEventListener('click',()=>{

    wrapper.classList.add('active');
});

loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});

if(btnPopup){
   btnPopup.addEventListener('click',()=>{

    news.classList.remove('ativar');
    contato.classList.remove('ativar');
    dash.classList.remove('ativar');
    sobre.classList.remove('ativar');
    inicio.classList.remove('ativar');

    wrapper.classList.add('active-popup');
    
}); 
}


iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active-popup');
});

//******************************************************************
//INICIO
const inicio = document.querySelector('.inicio .caixa');
const inicio_lnk = document.querySelector('.inicioLink');
const inicio_iconClose = document.querySelector('.inicio .caixa .icon-close');

inicio_lnk.addEventListener('click',()=>{

    news.classList.remove('ativar');
    contato.classList.remove('ativar');
    dash.classList.remove('ativar');
    sobre.classList.remove('ativar');
    wrapper.classList.remove('active-popup');

   inicio.classList.add('ativar');
});

inicio_iconClose.addEventListener('click',()=>{
   inicio.classList.remove('ativar');
});

//******************************************************************
//SOBRE
const  sobre = document.querySelector('.sobre .caixa');
const sobre_lnk = document.querySelector('.sobreLink');
const sobre_iconClose = document.querySelector('.sobre .caixa .icon-close');

sobre_lnk.addEventListener('click',()=>{
    news.classList.remove('ativar');
    contato.classList.remove('ativar');
    dash.classList.remove('ativar');
    inicio.classList.remove('ativar');
    wrapper.classList.remove('active-popup');

   sobre.classList.add('ativar');
});

sobre_iconClose.addEventListener('click',()=>{
   sobre.classList.remove('ativar');
});

//******************************************************************
//SOBRE
const  dash = document.querySelector('.dash .caixa');
const dash_lnk = document.querySelector('.dashLink');
const dash_iconClose = document.querySelector('.dash .caixa .icon-close');

dash_lnk.addEventListener('click',()=>{

    news.classList.remove('ativar');
    contato.classList.remove('ativar');
    sobre.classList.remove('ativar');
    inicio.classList.remove('ativar');
    wrapper.classList.remove('active-popup');

    dash.classList.add('ativar');
});

dash_iconClose.addEventListener('click',()=>{
    dash.classList.remove('ativar');
});


//******************************************************************
//CONTATO
const  contato = document.querySelector('.contato .caixa');
const contato_lnk = document.querySelector('.contatoLink');
const contato_iconClose = document.querySelector('.contato .caixa .icon-close');

contato_lnk.addEventListener('click',()=>{

    news.classList.remove('ativar');
    dash.classList.remove('ativar');
    sobre.classList.remove('ativar');
    inicio.classList.remove('ativar');
    wrapper.classList.remove('active-popup');

    contato.classList.add('ativar');
});

contato_iconClose.addEventListener('click',()=>{
    contato.classList.remove('ativar');
    
});


//******************************************************************
//CONTATO
const  news = document.querySelector('.news .caixa');
const news_lnk = document.querySelector('.newsLink');
const news_iconClose = document.querySelector('.news .caixa .icon-close');

news_lnk.addEventListener('click',()=>{

    contato.classList.remove('ativar');
    dash.classList.remove('ativar');
    sobre.classList.remove('ativar');
    inicio.classList.remove('ativar');
    wrapper.classList.remove('active-popup');

    news.classList.add('ativar');
});

news_iconClose.addEventListener('click',()=>{
    news.classList.remove('ativar');
});