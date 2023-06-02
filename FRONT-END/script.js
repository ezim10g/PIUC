const tema = (document.getElementById('tema').value);
console.log(tema);

class Menu {

    constructor(btnAbrir, menuConteudo, btnFechar) {
        this.btnAbrir = document.querySelector(btnAbrir);
        this.menuConteudo = document.querySelector(menuConteudo);
        this.btnFechar = document.querySelector(btnFechar);
    }

    Abrir(array) {
        array.forEach(element => {
            if (element === this.menuConteudo) {
                this.menuConteudo.classList.add('ativar');
            } else {
                element.classList.remove('ativar');
            }

        });
    }

    fechar(array) {
        array.forEach(element => {
            if (element === this.menuConteudo) {
                element.classList.remove('ativar');
            }
        });
    }
}

const arrayMenuFixos = [];
const arrayMenuConteudoFixos = [];
const arrayMenutemp = [];


const inicioMenu = ['.inicioLink', '.inicio .caixa', '.inicio .caixa .icon-close'];
const sobreMenu = ['.sobreLink', '.sobre .caixa', '.sobre .caixa .icon-close'];

if(tema == 'claro'){
    const dashMenu = ['.dashLink', '.dash .caixa', '.dash .caixa .icon-close'];
    arrayMenutemp.push(dashMenu);
}else if (tema == 'escuro'){
    const dashMenuDark = ['.dashLink', '.dash-dark .caixa', '.dash-dark .caixa .icon-close'];
    arrayMenutemp.push(dashMenuDark);
}

const contatoMenu = ['.contatoLink', '.contato .caixa-form', '.contato .caixa-form .icon-close'];
const newsMenu = ['.newsLink', '.news .caixa-form', '.news .caixa-form .icon-close'];
const loginMenu = [`.btnLogin-popup`, `.login .wrapper`, `.login .wrapper .icon-close`];





arrayMenutemp.push(inicioMenu);
arrayMenutemp.push(sobreMenu);



arrayMenutemp.push(contatoMenu);
arrayMenutemp.push(newsMenu);
arrayMenutemp.push(loginMenu);


arrayMenutemp.forEach(element => {
    const teste = document.querySelector(element[0]);

    if (teste) {
        arrayMenuFixos.push(new Menu(element[0], element[1], element[2]));
        
    }
});

arrayMenuFixos.forEach(element => {
    arrayMenuConteudoFixos.push(element.menuConteudo);
});

arrayMenuFixos.forEach(element => {
    element.btnAbrir.addEventListener('click',()=>{
        element.Abrir(arrayMenuConteudoFixos);
    });
    element.btnFechar.addEventListener('click',() =>{
        element.fechar(arrayMenuConteudoFixos);
    });
});

const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const iconClose = document.querySelector('.icon-close');
const loginLink = document.querySelector('.login-link');

registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
});

loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});
iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});

/******************DropDown menu hamburguer click***************/

$(document).ready(function() {
    $('.hamburguer').click(function() {
        $('.navigation').toggleClass('show');
    });

});


