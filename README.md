# Digital Wallet Project

## Overview
The Digital Wallet project is a web application that allows users to manage their digital wallet, including functionalities for adding money, sending money, viewing transaction history, and user registration and login.

## Files and Functionality

- **config.php**: Establishes a connection to the MySQL database using the mysqli extension. It checks for connection errors and terminates the script if the connection fails.

- **dashboard.php**: Displays the user's dashboard, showing their name and wallet balance. It includes a navigation bar and footer for easy navigation.

- **index.php**: The home page of the application. It sets a cookie for the username and displays a welcome message. It includes a navigation bar and footer.

- **login.php**: Contains the login form for users to enter their email and password. It processes the login request and redirects to the dashboard upon successful login. It includes a navigation bar and footer.

- **logout.php**: Handles user logout by destroying the session and optionally deleting cookies. It redirects the user to the login page.

- **register.php**: Contains the registration form for new users. It processes the registration request and inserts user data into the database. It includes a navigation bar and footer.

- **send_money.php**: Allows users to send money to another user by entering the receiver's email and the amount. It processes the transaction and updates the database. It includes a navigation bar and footer.

- **transactions.php**: Displays the user's transaction history, showing all transactions related to the user. It includes a navigation bar and footer.

- **add_money.php**: Allows users to add money to their wallet. It processes the amount entered and updates the wallet balance in the database. It includes a navigation bar and footer.

- **style.css**: Contains the CSS styles for the application, including styles for the layout, forms, buttons, and responsive design.

- **index.css**: Contains additional CSS styles specifically for the index page, including styles for the header, navigation, and footer.

## Setup Instructions

1. **Clone the Repository**: Clone this repository to your local machine using `git clone <repository-url>`.

2. **Database Setup**: 
   - Create a MySQL database named `digital_wallet`.
   - Import the necessary SQL schema to create the `Users` and `Transactions` tables.

3. **Configuration**: 
   - Update the `config.php` file with your database credentials if they differ from the default settings.

4. **Run the Application**: 
   - Start a local server (e.g., XAMPP, WAMP).
   - Place the project files in the server's root directory (e.g., `htdocs` for XAMPP).
   - Access the application via your web browser at `http://localhost/digital_wallet/index.php`.

## Usage Guidelines

- **User Registration**: New users can register through the registration page.
- **User Login**: Existing users can log in using their email and password.
- **Wallet Management**: Users can add money to their wallet and send money to other users.
- **Transaction History**: Users can view their transaction history at any time.

## License
This project is open-source and available for modification and distribution under the MIT License.