document.addEventListener('DOMContentLoaded', function () {
    console.log('Frontend JS loaded');

    // مدیریت پاپ‌آپ در پنل ادمین (برای اضافه کردن محصول)
    const addProductButton = document.querySelector('.add-product-btn');
    if (addProductButton) {
        console.log('Add product button found');
        const adminModal = document.querySelector('.admin-modal-overlay');
        const adminCancelButton = adminModal ? adminModal.querySelector('.admin-cancel-modal') : null;

        if (adminModal && adminCancelButton) {
            addProductButton.addEventListener('click', function (e) {
                e.preventDefault();
                console.log('Add product button clicked');
                adminModal.style.display = 'flex';
            });

            adminCancelButton.addEventListener('click', function () {
                console.log('Cancel button clicked (admin)');
                adminModal.style.display = 'none';
            });

            adminModal.addEventListener('click', function (e) {
                if (e.target === adminModal) {
                    console.log('Modal overlay clicked (admin)');
                    adminModal.style.display = 'none';
                }
            });

            const form = adminModal.querySelector('form');
            if (form) {
                form.addEventListener('submit', function (e) {
                    console.log('Form submitted (admin)');
                    const formData = new FormData(form);
                    for (let [key, value] of formData.entries()) {
                        console.log(key + ': ' + value);
                    }
                });
            }
        } else {
            console.log('Admin modal or cancel button not found');
        }
    }

    // مدیریت پاپ‌آپ لایسنس‌ها
    const openLicenseButton = document.querySelector('.license-button--open');
    const licenseModal = document.querySelector('.license-modal-overlay');
    const licenseCancelButton = licenseModal ? licenseModal.querySelector('.license-cancel-modal') : null;

    if (openLicenseButton && licenseModal && licenseCancelButton) {
        console.log('License modal elements found');
        openLicenseButton.addEventListener('click', function (e) {
            e.preventDefault();
            console.log('Open license button clicked');
            licenseModal.style.display = 'flex';
        });

        licenseCancelButton.addEventListener('click', function () {
            console.log('Cancel button clicked (licenses)');
            licenseModal.style.display = 'none';
        });

        licenseModal.addEventListener('click', function (e) {
            if (e.target === licenseModal) {
                console.log('Modal overlay clicked (licenses)');
                licenseModal.style.display = 'none';
            }
        });

        // نمایش پویای قیمت لایسنس
        const productSelect = licenseModal.querySelector('#product_id');
        const priceInput = licenseModal.querySelector('#license_price');

        if (productSelect && priceInput) {
            productSelect.addEventListener('change', function () {
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                const price = selectedOption.getAttribute('data-price') || '0';
                priceInput.value = '$' + parseFloat(price).toFixed(2);
            });
        }
    } else {
        console.log('License modal elements not found:', {
            openLicenseButton: !!openLicenseButton,
            licenseModal: !!licenseModal,
            licenseCancelButton: !!licenseCancelButton
        });
    }
});