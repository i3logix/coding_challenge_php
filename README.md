<h2>Congratulations for making it to the next stage of the i3logix interview!</h2>

These challenges are designed to give us a sense of your style as a programmer as well as your ability to solve problems.

Like real life, we expect that you may need or want to look at some
completed solutions to these problems in order to inspire your solution. Please keep in mind though that during the next stage of the interview process you will need to make alterations to your code to solve for different use-cases and/or edge-cases, so please make sure to write something that you fully understand.

<b>Please only complete *one* of the three challenges!</b>

<h2>Submission Steps</h2>

This is what you'll need to do to submit your challenge:

1. Fork this repo
2. Once you're finished, email us a link to your repo

<h2>Testing and Additional Notes</h2>

This repository includes a `composer.json` file which will install PHPUnit. It also includes a default phpunit configuration. After running `composer install` you should be able to run:

- `composer test-gol` (Runs tests for all the **The Game of Life** challenge)
- `composer test-poker` (Runs tests for all the **Ranking Poker Hands** challenge)
- `composer test-number` (Runs tests for all the **Converting a Number to a String** challenge)
- `composer test-all` (Runs tests for all the challenges)

Please feel free (and encouraged) to use unit tests to solve the challenge. Please also make sure that all the provided tests for the challenge you pick are passing before submitting your solution.

Feel free (and encouraged) to use any built-in PHP functionality to solve these challenges, especially new features in PHP 7.0-7.2. 

# The Game of Life
<details>

To run the provided tests, run `composer test-gol`.

Write some code that evolves generations through the "game of
life". The input will be a game board of cells, either alive (1) or dead
(0).

The code should take this board and create a new board for the
next generation based on the following rules:
1) Any live cell with fewer than two live neighbours dies (underpopulation)
2) Any live cell with two or three live neighbours lives on to
the next generation (survival)
3) Any live cell with more than three live neighbours dies
(overcrowding)
4) Any dead cell with exactly three live neighbours becomes a
live cell (reproduction)

As an example, this game board as input:

```
0 1 0 0 0
1 0 0 1 1
1 1 0 0 1
0 1 0 0 0
1 0 0 0 1
```

Will have a subsequent generation of:

```
0 0 0 0 0
1 0 1 1 1
1 1 1 1 1
0 1 0 0 0
0 0 0 0 0
```
</details>

# Ranking Poker Hands
<details>

To run the provided tests, run `composer test-poker`.

Write code that will evaluate a poker hand and determine its
rank.

Example:

Hand: Ah As 10c 7d 6s (Pair of Aces)

Hand: Kh Kc 3s 3h 2d (2 Pair)

Hand: Kh Qh 6h 2h 9h (Flush)
</details>

# Converting a Number to a String
<details>

To run the provided tests, run `composer test-number`.

Write code that will accept a number and convert it to the
appropriate string representation.

Basic Requirements:

* Represent numbers to the hundredth position
* Represent numbers at least to 9,999,999,999.99 - You can go further though.

Example:

Convert 2523.04
to "Two thousand five hundred twenty-three and 04/100 dollars"
</details>
