# 🎉 Justablog 🎉

Welcome to **Justablog**—your ultimate hub for sharing delightful stories, adorable moments, and captivating content! 🚀✨ Built with Laravel and styled with Tailwind CSS, Justablog combines a sleek, modern design with powerful functionality. Whether you're a blogger, reader, or simply someone who enjoys cute content, you'll find something to love here!

## 🛠 Features

-   **✨ User Authentication**: Seamlessly register, log in, and manage your profile.
-   **📝 Post Creation**: Craft and publish beautiful posts with rich text formatting.
-   **💬 Comments**: Dive into discussions with nested comments and replies.
-   **❤️ Likes**: Show your appreciation with a simple, elegant like button.
-   **🌑 Dark Mode**: Switch to a sophisticated dark mode for a stylish reading experience.
-   **📱 Responsive Design**: Enjoy a layout that adapts flawlessly to any device.

## 🚀 Getting Started

### Prerequisites

Before you dive in, make sure you have the following:

-   PHP >= 8.1
-   Composer
-   Laravel 11
-   SQLite or another supported database

### Installation

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/justablog.git
    cd justablog
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

3. **Set Up Environment**

    Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    Generate the application key:

    ```bash
    php artisan key:generate
    ```

4. **Configure Database**

    Update your `.env` file with your database configuration. For SQLite:

    ```plaintext
    DB_CONNECTION=sqlite
    DB_DATABASE=/path/to/your/database.sqlite
    ```

    (Create the SQLite file if it doesn’t exist.)

5. **Run Migrations and Seeders**

    ```bash
    php artisan migrate --seed
    ```

6. **Start the Development Server**

    ```bash
    php artisan serve
    ```

    Open your browser and visit `http://localhost:8000` to see Justablog in action!

## 💡 Key Concepts Learned

-   **Adding Comments & Nested Resource Routes**: Mastered the art of implementing nested resource routes for a dynamic and interactive commenting system.
-   **Likes Functionality**: Implemented a smooth and intuitive like feature to engage users and boost post interactions.
-   **Tailwind CSS Styling**: Enhanced my skills with Tailwind CSS to create a visually appealing and responsive design.

## ✨ Contributing

We love contributions! To make your mark on Justablog:

1. **Fork the Repository**
2. **Create a New Branch** (`git checkout -b feature/YourFeature`)
3. **Commit Your Changes** (`git commit -am 'Add new feature'`)
4. **Push to the Branch** (`git push origin feature/YourFeature`)
5. **Create a Pull Request**

## 📜 License

This project is licensed under the MIT License. Check out the [LICENSE](LICENSE) file for more details.

## 📬 Contact

Got questions, feedback, or just want to say hi? Reach out to us at [your.email@example.com](mailto:your.email@example.com) or open an issue on [GitHub](https://github.com/yourusername/justablog/issues). We’d love to hear from you!

---

Feel free to customize any parts, such as the contact information or GitHub URL, to fit your project details.
