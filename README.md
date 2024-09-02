# 🎉 Justablog 🎉

Welcome to **Justablog**—your ultimate hub for sharing delightful stories, adorable moments, and captivating content! 🚀✨ Built with Laravel and styled with Tailwind CSS, Justablog combines a sleek, modern design with powerful functionality. Whether you're a blogger, reader, or simply someone who enjoys cute content, you'll find something to love here!

![image](https://github.com/user-attachments/assets/1b454853-593a-4e44-9050-30ee97061af3)
![image](https://github.com/user-attachments/assets/13acfaf5-8227-41c4-ab0d-2b2d15f7801e)
![image](https://github.com/user-attachments/assets/48a3948b-dca5-42dd-9eb8-d30da99b8ad9)
![image](https://github.com/user-attachments/assets/914d81a1-e577-4556-8ec9-43b5bb9d350a)
![image](https://github.com/user-attachments/assets/523de7a9-82a6-4e0a-9a39-645558d78306)
![image](https://github.com/user-attachments/assets/c822d76c-b28f-475c-b6ce-69fafee3207e)


## 🛠 Features

-   **✨ User Authentication**: Seamlessly register, log in, and manage your profile.
-   **📝 Post Creation**: Craft and publish beautiful posts with ease.
-   **💬 Comments**: Express how you feel about a certain post without the hassle of following boring threads at 2 am.
-   **❤️ Likes**: Show your appreciation with a simple, elegant like button.
-   **🌑 Dark Mode**: Because I love it too :)
-   **📱 Responsive Design**: Enjoy a layout that adapts flawlessly to any device.
-   **🔍 Search Functionality**: Easily find posts by title using the new search feature.
-   **👥 Follow/Unfollow System**: Keep up with posts from users you follow and manage your connections effortlessly.

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
    git clone https://github.com/EngMohammedKareem/justablog.git
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
Got questions or feedback? Open an issue on [GitHub](https://github.com/yourusername/justablog/issues). I’d love to hear from you!
---
