## NOTIFICATIONS ARE FINALLY HERE !!!!

I'm very excited and exhausted to announce that after learning more about laravel i was able to implement not only mail notifications but standard database notifications to improve the user experience i'm hoping

-   get notified when someone likes any of your posts and click on the notification to navigate to that post

-   get notified when someone leaves a new comment on one of your posts and as above, click on it to be taken to that post

-   get notified when someone starts to follow you

Check it out

![image](https://github.com/user-attachments/assets/00b69d3e-d65d-484c-9b50-7897f04973d5)

---

## 🎉 New Features: search users by username + flash messages + new navbar look + improved menu for mobile users

I'm very excited to announce that my small side project is now shaping up very well and today i implemented new features including:

-   finding users by usernames: yes the feature is finally here and now you can connect with other people by searching their username on Justablog
-   added some flash messages for posts / commeents events like updating and deleting just cause it's a nice feature to have
-   since removing the post button from the home page i added it to the navbar and the mobile usrrs responsive menu for better user experience ( same with the users search feature )
-   slightly improved profiles now
-   fixed a seriously annoying bug that was preventing the search form from functioning properly

![image](https://github.com/user-attachments/assets/b19390cb-5a77-4ac0-bfe2-1de856f09605)

![image](https://github.com/user-attachments/assets/03da084d-cbbe-488b-a8c1-bb88568f995b)

🚀 Key Benefits

1. Improved User Discovery: Easily find and connect with other users by searching for their usernames.
2. Enhanced Usability: Simple and intuitive search interface that enhances the user experience.
3. Faster Connections: Quickly locate users without having to navigate through posts ( terrible experience i know ).

My biggest hope is that someone is watching this project grow now and be inspired to create their own projects and enjoy the process

**contributions are always welcome as they help me learn more laravel**

---

## 🚀 Major Feature Update: User Profiles & Follow/Unfollow 🚀

I'm extremely proud and excited to introduce two fantastic new features that will take your experience to the next level! 🎉✨

🔹 Customize Your Profile: Make your profile truly yours with our new customization options. Add a personal touch and showcase what makes you unique! 🖼️🎨

🔹 Explore and Connect: Check out other users' profiles and see what they’re all about. Discover new connections and be inspired by the community! 🌟👥

🔹 Follow/Unfollow Feature: Stay updated with your favorite users by following them. Easily manage your connections with the new unfollow option, so you’re always in control of your feed! 🔄🔍

![image](https://github.com/user-attachments/assets/5939ccfe-c56c-45c2-b5e9-a870f65ea117)

![image](https://github.com/user-attachments/assets/4f516bcd-c2a5-4469-9c92-e898871c36d7)

But i need your help! 🙌

Our project is all about community and collaboration, and I'm eager to make it even better as this is my first ever "big" project and i could use any help to maintain it and see it glow, Here’s how you can contribute:

🔧 Contribute to Development: Dive into the code, suggest improvements, or tackle open issues. Every contribution makes a difference!

📝 Provide Feedback: Share your thoughts on the new features. Your feedback helps us refine and enhance the project.

🌟 Spread the Word: Let your network know about our exciting updates and invite others to join the community!

Join us in shaping the future of this project. Your involvement is invaluable, and together, we can achieve great things! 🚀💪

---

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
