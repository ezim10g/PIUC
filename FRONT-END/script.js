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
const inicioMenu = ['.inicioLink', '.inicio .caixa', '.inicio .caixa .icon-close'];
const sobreMenu = ['.sobreLink', '.sobre .caixa', '.sobre .caixa .icon-close'];
//const dashMenu = ['.dashLink', '.dash .caixa', '.dash .caixa .icon-close'];
const dashMenuDark = ['.dashLink', '.dash-dark .caixa', '.dash-dark .caixa .icon-close'];
const contatoMenu = ['.contatoLink', '.contato .caixa', '.contato .caixa .icon-close'];
const newsMenu = ['.newsLink', '.news .caixa', '.news .caixa .icon-close'];
const loginMenu = [`.btnLogin-popup`, `.login .wrapper`, `.login .wrapper .icon-close`];



const arrayMenuFixos = [];
const arrayMenuConteudoFixos = [];


const arrayMenutemp = [];

arrayMenutemp.push(inicioMenu);
arrayMenutemp.push(sobreMenu);
//arrayMenutemp.push(dashMenu);
arrayMenutemp.push(dashMenuDark);
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

