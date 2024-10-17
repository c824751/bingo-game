# Bingo Game

This is a simple Bingo game developed using Vue.js.

<img width="206" alt="image" src="https://github.com/user-attachments/assets/1c0fa7f4-eeec-4eb5-9d03-dbaa1e61ed64">

## Prerequisites

Ensure that you have PHP installed on your system. You can download it from the official [PHP website](https://www.php.net/downloads.php) or install it using your preferred package manager.

## File Description

### `index.html`

This is the main HTML file for the web page, which includes the implementation of the Vue.js application. It contains the following main parts:

- **Bingo Board**: Displays a 5x5 Bingo board.
- **Game Control**: Includes a "Play" button and sections for displaying the remaining ball count and drawn ball numbers.
- **Vue.js Application**: Implements the game logic, including fetching the Bingo board, drawing balls, checking for winners, etc.

### `core.php`

This PHP file is used for initializing the Bingo board and handling the logic for drawing balls. It includes the following main features:

- `initBingoBoard()` function: Initializes the Bingo board by generating a set of 25 random numbers (selected from 1 to 60).
- **Handling POST requests**: Receives the currently drawn ball numbers and remaining ball count, randomly draws a new ball from the remaining balls, and returns the newly drawn ball number, all drawn ball numbers, and the remaining ball count.
- **Handling GET requests**: Returns the initialized Bingo board.

## Usage

1. Place `index.html` and `core.php` in the same folder.
2. Open the `index.html` file in a web browser.
3. Click the "Play" button to start the game.
4. Each time the "Play" button is clicked, a new ball will be randomly drawn from the remaining balls.
5. When a horizontal, vertical, or diagonal line is formed on the Bingo board, you win the game.

## Notes

- When the remaining ball count is 0, you will be unable to continue drawing balls, and you will need to restart the game.
- The functionality for automatically resetting the game has not been implemented yet; you will need to manually refresh the page to start a new game.
