document.addEventListener('DOMContentLoaded', function () {
    // --- 1. KHỞI TẠO BIẾN ---
    const quantityEl = document.getElementById('quantity');
    const priceEl = document.getElementById('price');
    const decreaseBtn = document.getElementById('decrease');
    const increaseBtn = document.getElementById('increase');
    const sizeOptions = document.querySelectorAll('.option');
    const mainImage = document.getElementById('mainImage');
    const thumbImages = document.querySelectorAll('.anhnho img');
    const cartBtn = document.querySelector('.tgh');

    // Lấy giá khởi điểm từ nút option đang active hoặc từ text hiển thị
    let unitPrice = sizeOptions.length > 0 
        ? parseInt(document.querySelector('.option.active').getAttribute('data-price')) 
        : parseInt(priceEl.textContent.replace(/\.|đ/g, ''));
    
    let quantity = 1;

    // --- 2. HÀM HỖ TRỢ ---
    function updateDisplay() {
        if (quantityEl) quantityEl.textContent = quantity;
        if (priceEl) priceEl.textContent = (unitPrice * quantity).toLocaleString('vi-VN') + 'đ';
    }

    // Cập nhật số lượng hiển thị trên header (icon giỏ hàng)
    window.capNhatSoLuongHeader = function() {
        const gio = JSON.parse(localStorage.getItem('gioHang')) || [];
        const tong = gio.reduce((s, i) => s + i.soLuong, 0);
        const countEl = document.getElementById('so-luong');
        if (countEl) countEl.textContent = tong;
    }

    // --- 3. SỰ KIỆN TƯƠNG TÁC ---

    // Thay đổi ảnh sản phẩm
    thumbImages.forEach(thumb => {
        thumb.addEventListener('click', function () {
            mainImage.src = this.src;
            thumbImages.forEach(img => img.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Tăng/Giảm số lượng
    if (increaseBtn) {
        increaseBtn.addEventListener('click', () => {
            quantity += 1;
            updateDisplay();
        });
    }

    if (decreaseBtn) {
        decreaseBtn.addEventListener('click', () => {
            if (quantity > 1) {
                quantity -= 1;
                updateDisplay();
            }
        });
    }

    // Chọn Option (Size/Trọng lượng)
    sizeOptions.forEach(option => {
        option.addEventListener('click', function () {
            sizeOptions.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            unitPrice = parseInt(this.getAttribute('data-price'));
            updateDisplay();
        });
    });

    // Thêm vào giỏ hàng
    if (cartBtn) {
        cartBtn.addEventListener('click', function() {
            const tenBanh = document.querySelector('.tenbanh').textContent;
            const sizeEl = document.querySelector('.option.active');
            const size = sizeEl ? sizeEl.textContent : 'Tiêu chuẩn';
            
            const gioHang = JSON.parse(localStorage.getItem('gioHang')) || [];
            const key = `${tenBanh}-${size}`;
            
            const itemHienTai = {
                key: key,
                ten: tenBanh,
                size: size,
                gia: unitPrice,
                soLuong: quantity
            };

            const index = gioHang.findIndex(i => i.key === key);
            if (index > -1) {
                gioHang[index].soLuong += quantity;
            } else {
                gioHang.push(itemHienTai);
            }

            localStorage.setItem('gioHang', JSON.stringify(gioHang));
            window.capNhatSoLuongHeader();
            alert(`Đã thêm ${quantity} ${tenBanh} (${size}) vào giỏ hàng!`);
        });
    }

    // Chạy lần đầu để đồng bộ số lượng header
    window.capNhatSoLuongHeader();
});