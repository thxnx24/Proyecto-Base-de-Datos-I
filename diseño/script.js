document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navbarMenu = document.querySelector('.navbar-menu');

    menuToggle.addEventListener('click', function() {
        navbarMenu.classList.toggle('show');
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const cartIconContainer = document.querySelector('.fa-basket-shopping');
    const cartIcon = document.querySelector('.content-shopping-cart .number');
    const cartPanel = document.querySelector('.cart-panel');
    const cartPanelItems = document.querySelector('.cart-items');
    const totalQuantityDisplay = document.querySelector('.total-quantity');
    const totalPriceDisplay = document.querySelector('.total-price');
    const closeCartButton = document.querySelector('.close-cart-btn');
    const userIcon = document.querySelector('.fa-user');
    const userPanel = document.querySelector('.user-panel');
    const closeButton = document.querySelector('.close-user-btn');

    let totalQuantity = 0;
    let totalPrice = 0;

    userIcon.addEventListener('click', function() {
        userPanel.style.display = userPanel.style.display === 'block' ? 'none' : 'block';
    });

    closeButton.addEventListener('click', function() {
        userPanel.style.display = 'none';
    });

    cartIconContainer.addEventListener('click', function() {
        cartPanel.classList.toggle('open');
    });

    closeCartButton.addEventListener('click', function() {
        cartPanel.classList.remove('open');
    });

    document.querySelectorAll('.add-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productCard = button.closest('.card-product');
            const productName = productCard.querySelector('h3').textContent.trim();
            const priceElement = productCard.querySelector('.price');
            let productPriceText;

            if (priceElement.querySelector('span')) {
                productPriceText = priceElement.childNodes[0].textContent.trim();
            } else {
                productPriceText = priceElement.textContent.trim();
            }

            const productPrice = parseFloat(productPriceText.replace(/[^\d.]/g, ''));
            const productImageSrc = productCard.querySelector('.container-img img').src;

            addToCart(productName, productPrice, productImageSrc);
        });
    });

    function addToCart(name, price, imageSrc) {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <img src="${imageSrc}" alt="${name}" class="cart-item-image">
            <div class="cart-item-info">
                <p class="cart-item-name">${name}</p>
                <p class="cart-item-price">S/ ${price.toFixed(2)}</p>
            </div>
            <button class="remove-item-btn">&times;</button>
        `;
        const removeBtn = cartItem.querySelector('.remove-item-btn');
        removeBtn.addEventListener('click', function() {
            removeItemFromCart(cartItem, price);
        });

        cartPanelItems.appendChild(cartItem);

        totalQuantity++;
        totalPrice += price;
        updateCartSummary();
    }

    function removeItemFromCart(cartItem, price) {
        cartPanelItems.removeChild(cartItem);
        totalQuantity--;
        totalPrice -= price;
        updateCartSummary();
    }

    function updateCartSummary() {
        totalQuantityDisplay.textContent = totalQuantity;
        totalPriceDisplay.textContent = totalPrice.toFixed(2);
        cartIcon.textContent = `(${totalQuantity})`;
    }
});
