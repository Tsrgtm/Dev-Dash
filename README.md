# Dev Dash - Where Developers Share

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel Version](https://img.shields.io/badge/laravel-%5E12.x-FF2D20.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/php-%5E8.2-777BB4.svg)](https://www.php.net/)
[![Livewire Version](https://img.shields.io/badge/livewire-%5E3.x-FB70A9.svg)](https://livewire.laravel.com/)
[![TailwindCSS](https://img.shields.io/badge/tailwindcss-v4.1-38B2AC.svg)](https://tailwindcss.com)

Dev Dash is a community-driven platform for developers to share articles, tutorials, ideas, and engage in discussions. Inspired by platforms like dev.to, it aims to foster a collaborative environment for learning and knowledge sharing.

## ✨ Features

-   **Article Publishing:** Create and publish rich-text articles with code highlighting.
-   **User Profiles:** Showcase your contributions, articles, and activity.
-   **Tagging System:** Organize and discover content through relevant tags.
-   **Commenting & Discussions:** Engage with authors and the community on posts.
-   **Reactions/Likes:** Show appreciation for valuable content.
-   **Search Functionality:** Powerful live search to find articles, users, and tags.
-   **Responsive Design:** Accessible on various devices.
-   **Light & Dark Mode:** User-friendly interface with theme support.

## 🚀 Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & npm (or Yarn)
-   A database server (e.g., MySQL, PostgreSQL, SQLite)
-   Git

### Installation

1.  **Clone the repository:**

    ```bash
    git clone [https://github.com/Tsrgtm/Dev-Dash.git](https://github.com/Tsrgtm/Dev-Dash.git)
    cd Dev-Dash
    ```

2.  **Install PHP dependencies:**

    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies:**

    ```bash
    npm install
    # or if you use yarn
    # yarn install
    ```

4.  **Create your environment file:**
    Copy `.env.example` to `.env` and configure it:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Configure your `.env` file:**
    Update database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, etc.) and other necessary environment variables.

6.  **Run database migrations (and seeders if available):**

    ```bash
    php artisan migrate --seed
    ```

7.  **Compile frontend assets & Serve:**
    Your `composer.json` includes a `dev` script that handles serving the application along with asset compilation and queue listening:

    ```bash
    composer run dev
    ```

    Alternatively, for manual steps:

    -   Compile assets: `npm run dev` (for development) or `npm run build` (for production).
    -   Serve application: `php artisan serve`.

    Your Dev Dash should now be running at `http://localhost:8000` (or the port specified).

## 🛠️ Built With

-   [Laravel Framework ^12.x](https://laravel.com/)
-   [Livewire ^3.x](https://livewire.laravel.com/)
-   [Tailwind CSS v4.1](https://tailwindcss.com/)
-   [Blade UI Kit Heroicons ^2.6](https://blade-ui-kit.com/)
-   [Alpine.js](https://alpinejs.dev/) (Commonly used with Livewire/Tailwind)

## 🎨 Styling & Theming

-   **Tailwind CSS:** Styles are primarily managed using Tailwind utility classes. Configuration is in `resources/css/app.css`.
-   **Dark Mode:** Implemented using Tailwind's dark mode variant, respecting system preference and offering a manual toggle.
-   **Custom CSS:** Additional custom CSS is located in `resources/css/app.css`.

## 🧪 Running Tests

-   **PHPUnit/Pest (Backend Tests):**
    Use the `composer test` script:
    ```bash
    composer run test
    ```
    Or run directly:
    ```bash
    php artisan test
    ```
-   **Frontend Tests (if applicable):**
    ```bash
    npm run test
    ```

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1.  Fork the Project.
2.  Create your Feature Branch (`git checkout -b feature/AmazingFeature`).
3.  Commit your Changes (`git commit -m 'Add some AmazingFeature'`).
4.  Push to the Branch (`git push origin feature/AmazingFeature`).
5.  Open a Pull Request.

Please ensure to update tests as appropriate. For major changes, please open an issue first to discuss what you would like to change.

## 📜 License

Distributed under the MIT License. See `LICENSE` for more information.

## 📞 Contact

Tusar Gautam / Project Maintainer - [@tusargtm](https://x.com/tusargtm) - gautamtusar2@gmail.com

Project Link: [https://github.com/Tsrgtm/Dev-Dash](https://github.com/Tsrgtm/Dev-Dash)

## 🙏 Acknowledgements

-   Inspiration from platforms like dev.to.
