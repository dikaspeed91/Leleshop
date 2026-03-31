let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productId, productName, price) {
    // Add animation effect
    const btn = event.target;
    btn.style.transform = 'scale(0.95)';
    btn.style.transition = 'transform 0.2s';
    setTimeout(() => {
        btn.style.transform = '';
    }, 150);
    
    const existingItem = cart.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ id: productId, name: productName, price: price, quantity: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${productName} ditambahkan ke keranjang!`);
    updateCartCount();
}

function updateCartCount() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const cartLink = document.querySelector('a[href="cart.php"]');
    if (cartLink) {
        cartLink.textContent = `Keranjang (${totalItems})`;
    }
}

function displayCart() {
    const cartDiv = document.getElementById('cart-items');
    const totalEl = document.getElementById('total-amount');
    if (cartDiv) {
        cartDiv.innerHTML = '';
        let total = 0;
        cart.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'cart-item';
            itemDiv.innerHTML = `
                <div style="flex: 1;">
                    <p><strong>${item.name}</strong></p>
                    <p>Rp ${item.price.toLocaleString()} x ${item.quantity}</p>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <p>Rp ${(item.price * item.quantity).toLocaleString()}</p>
                    <button onclick="removeFromCart('${item.id}')" style="background: #f44336; color: white; border: none; padding: 0.5rem 1rem; border-radius: 20px; cursor: pointer;">Hapus</button>
                </div>
            `;
            cartDiv.appendChild(itemDiv);
            total += item.price * item.quantity;
        });
        if (total > 0) {
            totalEl.textContent = total.toLocaleString();
            document.getElementById('cart-total').style.display = 'block';
        }
    }
}

function showLoginModal(event) {
    event.preventDefault();
    document.getElementById('login-modal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function hideLoginModal() {
    document.getElementById('login-modal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function toggleHeader() {
    const headerContent = document.getElementById('header-content');

    const nav = document.getElementById('main-nav');
    const toggleBtn = document.querySelector('.toggle-header');
    headerContent.classList.toggle('collapsed');
    nav.classList.toggle('active');
    toggleBtn.textContent = nav.classList.contains('active') ? '✕' : '☰';
}

function checkout() {
    alert('Redirect to payment... Terima kasih!');
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
    updateCartCount();
}

function openWhatsApp(productName) {
    const message = encodeURIComponent(`Halo, saya tertarik dengan ${productName}. Info lengkap dan harga?`);
    window.open(`https://wa.me/6287866158652?text=${message}`, '_blank');
}

// Update cart count on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
    displayCart(); // For cart page
});
