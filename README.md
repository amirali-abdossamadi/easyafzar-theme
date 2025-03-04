@echo off
setlocal enabledelayedexpansion

(
echo # EasyAfzar Theme 🌟
echo.
echo ![EasyAfzar Logo](https://via.placeholder.com/150/1C2526/E74C3C?text=EASYAFZAR)
echo.
echo Welcome to **EasyAfzar Theme**, a premium WordPress theme crafted with a sleek, modern dark aesthetic inspired by futuristic interfaces like x.ai. This theme is designed for developers, businesses, and creators who want to build a professional, high-performance website with advanced features for product management and licensing.
echo.
echo EasyAfzar Theme combines elegance with functionality, offering a seamless user experience through its responsive design, optimized performance, and customizable features. Whether you're showcasing WordPress themes, plugins, or managing licenses, EasyAfzar has you covered.
echo.
echo ---
echo.
echo ## ✨ Key Features
echo.
echo - **Stunning Dark Mode Design**: A futuristic dark theme with gradient backgrounds, glassmorphism effects, and smooth animations for a premium look and feel.
echo - **Advanced Product Management**: Manage WordPress themes and plugins effortlessly through a sleek admin dashboard with popup forms.
echo - **Robust License System**: A user-friendly license purchasing system with popup forms, dynamic pricing, and detailed license history tracking.
echo - **User Dashboard**: A dedicated dashboard for users to view their purchased licenses and manage their account.
echo - **Fully Responsive**: Looks stunning on all devices, from desktops to mobiles, ensuring a consistent experience.
echo - **Performance Optimized**: Lightweight and fast, delivering quick load times and a smooth user experience.
echo - **Highly Customizable**: Easily adjust colors, fonts, layouts, and more to align with your brand identity.
echo - **Secure and Reliable**: Built with best practices to ensure security and reliability for your website.
echo.
echo ---
echo.
echo ## 🚀 Getting Started
echo.
echo Follow these steps to set up EasyAfzar Theme on your WordPress site.
echo.
echo ### Prerequisites
echo.
echo Before installing, ensure you have the following:
echo - **WordPress**: Version 5.0 or higher
echo - **PHP**: Version 7.4 or higher
echo - **MySQL**: Version 5.6 or higher
echo - **Server Requirements**: A server that supports WordPress hosting with at least 256MB of memory
echo.
echo ### Installation Steps
echo.
echo 1. **Clone the Repository**:
echo    ```
echo    git clone https://github.com/amirali-abdossamadi/easyafzar-theme.git
echo    ```
echo.
echo 2. **Move to WordPress Themes Directory**:
echo    - Copy the `easyafzar-theme` folder to your WordPress themes directory:
echo      ```
echo      wp-content/themes/
echo      ```
echo.
echo 3. **Activate the Theme**:
echo    - Log in to your WordPress admin panel.
echo    - Navigate to **Appearance > Themes**.
echo    - Find **EasyAfzar Theme** and click **Activate**.
echo.
echo 4. **Set Up Pages**:
echo    - Create the following pages and assign their respective templates:
echo      - **Dashboard**: Use the `Dashboard Page` template.
echo      - **Products**: Use the `Products Page` template.
echo      - **Licenses**: Use the `Licenses Page` template.
echo      - **Login**: Use the `Login Page` template (optional, for custom login functionality).
echo.
echo 5. **Configure Permalinks**:
echo    - Go to **Settings > Permalinks** in your WordPress admin panel.
echo    - Select **Post name** and save changes to ensure pretty URLs work correctly.
echo.
echo ### Initial Setup
echo - After activation, visit the **Products** menu in your WordPress admin panel to start adding products.
echo - Products will automatically appear on the **Products** and **Licenses** pages in the frontend.
echo.
echo ---
echo.
echo ## 🛠️ How to Use
echo.
echo ### Managing Products
echo - Navigate to the **Products** menu in your WordPress admin dashboard.
echo - Click **Add New Product** to open a popup form.
echo - Enter details such as the product name, description, type (theme or plugin), price, and product code.
echo - Products will be displayed on the **Products** page and available for licensing on the **Licenses** page.
echo.
echo ### Purchasing Licenses
echo - Visit the **Licenses** page on your website.
echo - Click the **Purchase License** button to open a sleek popup form.
echo - Select a product, choose the license duration, and confirm the purchase.
echo - Purchased licenses will be listed in the **License History** section below.
echo.
echo ### User Dashboard
echo - Access the **Dashboard** page to view your purchased licenses and manage your account details.
echo - This page provides a summary of your licensing activity.
echo.
echo ---
echo.
echo ## 🤝 Contributing to EasyAfzar Theme
echo.
echo We welcome contributions from the community! If you'd like to contribute to EasyAfzar Theme, please follow these steps:
echo.
echo 1. **Fork the Repository**:
echo    - Click the "Fork" button on the GitHub repository page to create a copy of the repository in your GitHub account.
echo.
echo 2. **Clone Your Fork**:
echo    ```bash
echo    git clone https://github.com/YOUR_USERNAME/easyafzar-theme.git
echo    ```
echo.
echo 3. **Create a New Branch**:
echo    ```bash
echo    git checkout -b feature/your-feature-name
echo    ```
echo.
echo 4. **Make Your Changes**:
echo    - Implement your feature or fix a bug.
echo    - Ensure your code follows the project's coding standards.
echo.
echo 5. **Commit Your Changes**:
echo    ```bash
echo    git commit -m "Add your feature description"
echo    ```
echo.
echo 6. **Push to Your Branch**:
echo    ```bash
echo    git push origin feature/your-feature-name
echo    ```
echo.
echo 7. **Open a Pull Request**:
echo    - Go to the original repository on GitHub.
echo    - Click "New Pull Request" and select your branch.
echo    - Provide a detailed description of your changes and submit the pull request.
echo.
echo ### Contribution Guidelines
echo - Ensure your code is well-documented and follows WordPress coding standards.
echo - Test your changes thoroughly before submitting a pull request.
echo - Be respectful and constructive in your communication with other contributors.
echo.
echo ---
echo.
echo ## 📜 License
echo.
echo This project is licensed under the **EasyAfzar Proprietary License**, a strict license that prohibits unauthorized use, reproduction, or distribution of the theme or its code. For more details, please see the [LICENSE](LICENSE) file.
echo.
echo ---
echo.
echo ## 📬 Contact Us
echo.
echo If you have any questions, need support, or would like to provide feedback, feel free to reach out:
echo.
echo - **Email**: support@easyafzar.com
echo - **GitHub Issues**: [Open an issue](https://github.com/amirali-abdossamadi/easyafzar-theme/issues)
echo - **Website**: [easyafzar.com](https://easyafzar.com) *(coming soon)*
echo.
echo ---
echo.
echo **Built with ❤️ by Amirali Abdossamadi**
echo.
echo Thank you for choosing EasyAfzar Theme! We hope it helps you create something amazing. 🚀
) > README.md

echo README.md created successfully!
pause