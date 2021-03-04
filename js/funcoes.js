/* ==================== LOGIN/ CADASTRO ==================== */
$(document).on('click','.user,.voltarlogin',function(){
    $('.modal-login-cadastro').addClass('login-active').removeClass('cadastro-active')
});

$(document).on('click', '.cadastro',function(){
    $('.modal-login-cadastro').addClass('cadastro-active').removeClass('login-active')
});

$(document).on('click', '.fechar-login',function(){
    $('.modal-login-cadastro').removeClass('login-active').removeClass('cadastro-active')
});

let modal = document.querySelector(".modal-login-cadastro");
window.onclick = function(event) {
    if(event.target == modal) {
        modal.classList.remove("login-active");
        modal.classList.remove("cadastro-active");
    }
};

/* =================== NEWSLETTER ===================== */
$(document).on('click','.newsletter-btn',function(){
    $('.mensagem-sucesso').addClass('mensagem-sucesso-active')
    $('.esconder').addClass('esconder-form')
});

/* =================== PRODUTOS SLIDER ===================== */
$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });

/* ==================== PÁGINA PRODUTOS FILTRO =================== */
function mostrarCategorias(){
  $(".categorias-tamanho").toggle()
};

/* ==================== PÁGINA PRODUTO ==================== */
function mostrarInfo(){
    $(".info").toggle()
};

function mostrarCaracteristicas(){
    $(".caracteristicas").toggle()
};

$(document).ready(function() {
    $('#vertical').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        vertical: true,
        verticalHeight: 600,
        thumbMargin: 0,
        vThumbWidth: 100,
        slideMargin: 0,
        thumbItem: 3,
        controls: false
    });
});

/* ====================== SACOLA ====================== 
$(document).on('click','.cart-btn',function(){
    $('.cart, .cart-overlay').addClass('showCart')
});

$(document).on('click','.close-cart',function(){
    $('.cart, .cart-overlay').removeClass('showCart')
});
*/

// variables

const cartBtn = document.querySelector(".cart-btn");
const closeCartBtn = document.querySelector(".close-cart");
const clearCartBtn = document.querySelector(".clear-cart");
const cartDOM = document.querySelector(".cart");
const cartOverlay = document.querySelector(".cart-overlay");
const cartItems = document.querySelector(".cart-items");
const cartTotal = document.querySelector(".cart-total");
const cartContent = document.querySelector(".cart-content");
const productsDOM = document.querySelector(".produtos-container");
// cart
let cart = [];
// buttons
let buttonsDOM = [];

//getting the products
class Products{
    async getProducts(){
        try {
            let result = await fetch('products.json');
            let data = await result.json();

            let products = data.items;
            products = products.map(item =>{
                const {title, price} = item.fields;
                const {id} = item.sys;
                const image = item.fields.image.fields.file.url;
                return {title, price, id, image};
            })
            return products;
        } catch (error) {
            console.log(error);
        }
    }
}
// display products
class UI {
    displayProducts(products){
        let result = '';
        products.forEach(product => {
            result +=`
            <div class="produto">
            <div class="slide-img">
                <img src=${product.image}>
                <div class="overlay">
                    <a href="produto-${product.id}.html" class="buy-btn" data-id=${product.id}>Shop Now</a>
                    
                </div>
            </div>
            <div class="detail-box">
                <div class="type">
                    <a href="#">${product.title}</a><br>
                    <a href="#" class="price">R$ ${product.price}</a>
                </div>
            </div>
            </div>`;
        });
        if(jQuery(".produtos-container").length>0){
            productsDOM.innerHTML = result;
        }
        
    }
    getBagButtons(){
        const buttons = [...document.querySelectorAll(".bag-btn")];
        buttonsDOM = buttons;
        buttons.forEach(button =>{
            let id = button.dataset.id;
            let inCart = cart.find(item => item.id === id);
            if(inCart){
                button.innerText = "Na Sacola";
                button.disabled = true
            }
            button.addEventListener('click', (event)=>{
                event.target.innerText = "Na Sacola";
                event.target.disabled = true;
                // get product from products
                let cartItem = {...Storage.getProduct(id), amount: 1 };
                // add product to the cart
                cart = [...cart, cartItem];
                // save cart in local storage
                Storage.saveCart(cart)
                // set cart values
                this.setCartValues(cart);
                // display cart items
                this.addCartItem(cartItem);
                // show the cart
                this.showCart();
            });
        });
    }
    setCartValues(cart){
        let tempTotal = 0;
        let itemsTotal = 0;
        cart.map(item =>{
           tempTotal += item.price * item.amount;
           itemsTotal += item.amount; 
        })
        cartTotal.innerText = parseFloat(tempTotal.toFixed(2))
        cartItems.innerText = itemsTotal;
    }
    addCartItem(item){
        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `<img src=${item.image}>
        <div class="item-info">
            <span>${item.title}</span><br>
            <span>R$${item.price}</span><br>
            <i class="fa fa-minus" data-id=${item.id}></i>
            <span class="item-amount">${item.amount}</span>
            <i class="fa fa-plus" data-id=${item.id}></i>
        </div>
        <div>
            <span class="fa fa-trash-o remove-item" data-id=${item.id}></span>
        </div>`;
        cartContent.appendChild(div);

    }
    showCart(){
        cartOverlay.classList.add('transparentBcg');
        cartDOM.classList.add('showCart');
    }
    setupAPP() {
        cart = Storage.getCart();
        this.setCartValues(cart);
        this.populateCart(cart);
        cartBtn.addEventListener('click',this.showCart);
        closeCartBtn.addEventListener('click',this.hideCart)
    }
    populateCart(cart){
        cart.forEach(item =>this.addCartItem(item));
    }
    hideCart(){
        cartOverlay.classList.remove('transparentBcg');
        cartDOM.classList.remove('showCart');
    }
    cartLogic(){
        // clear cart button
        clearCartBtn.addEventListener('click', () => {
            this.clearCart();
        });
        // cart functionality
        cartContent.addEventListener('click', event=>{
            if(event.target.classList.contains('remove-item')){
                let removeItem = event.target;
                let id = removeItem.dataset.id;
                cartContent.removeChild(removeItem.parentElement.parentElement);
                this.removeItem(id);
            }
            else if(event.target.classList.contains("fa-plus")){
                let addAmount = event.target;
                let id = addAmount.dataset.id;
                let tempItem = cart.find(item => item.id===id);
                tempItem.amount = tempItem.amount + 1;
                Storage.saveCart(cart);
                this.setCartValues(cart);
                addAmount.previousElementSibling.innerText = tempItem.amount;
            }
            else if (event.target.classList.contains("fa-minus")){
                let lowerAmount = event.target;
                let id = lowerAmount.dataset.id;
                let tempItem = cart.find(item => item.id === id);
                tempItem.amount = tempItem.amount - 1;
                if(tempItem.amount > 0){
                    Storage.saveCart(cart);
                    this.setCartValues(cart);
                    lowerAmount.nextElementSibling.innerText = tempItem.amount;
                }
                else{
                    cartContent.removeChild(lowerAmount.parentElement.parentElement);
                    this.removeItem(id)
                }
            }
        });
    }
    clearCart(){
        let cartItems = cart.map(item => item.id);
        cartItems.forEach(id => this.removeItem(id));
        while(cartContent.children.length>0){
            cartContent.removeChild(cartContent.children[0])
        }
        this.hideCart();
    }
    removeItem(id){
        cart = cart.filter(item => item.id !==id);
        this.setCartValues(cart);
        Storage.saveCart(cart);
        let button = this.getSingleButton(id);
        button.disabled = false;
        button.innerHTML = `Adicionar à Sacola`;
    }
    getSingleButton(id){
        return buttonsDOM.find(button => button.dataset.id === id);
    }
}
// local storage
class Storage {
    static saveProducts(products) {
     localStorage.setItem("products", JSON.stringify(products));
    }
    static getProduct(id){
        let products = JSON.parse(localStorage.getItem('products'));
        return products.find(product => product.id === id);
    }
    static saveCart(cart){
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    static getCart(){
        return localStorage.getItem('cart')?JSON.parse(localStorage.getItem('cart')):[]
    }
}

document.addEventListener("DOMContentLoaded", ()=>{
    const ui = new UI();
    const products = new Products();
    // setup app
    ui.setupAPP();

    // get all products
    products.getProducts().then(products => {
        ui.displayProducts(products);
        Storage.saveProducts(products);
    }).then(()=>{
        ui.getBagButtons();
        ui.cartLogic();
    });
});