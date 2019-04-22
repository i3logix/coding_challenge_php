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

This repository includes a `composer.json` file which will install PHPUnit. [If you don't have composer, you can find instructions on installing it here.](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) It also includes a default phpunit configuration. After running `composer install` you should be able to run:

- `composer test-gol` (Runs tests for all the **The Game of Life** challenge)
- `composer test-poker` (Runs tests for all the **Ranking Poker Hands** challenge)

Please be sure all included unit tests are passing before you submit your solution.

# The Game of Life
<details>

To run the provided tests, run `composer test-gol`.

Write some code that evolves generations through the [Conway's game of
life](https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life). The input will be a game board of cells, either alive (1) or dead
(0).

The code should take this board and create a new board for the
next generation based on the following rules:
1) Any live cell with fewer than two live neighbors dies (underpopulation)
2) Any live cell with two or three live neighbors lives on to
the next generation (survival)
3) Any live cell with more than three live neighbors dies
(overcrowding)
4) Any dead cell with exactly three live neighbors becomes a
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

Hand: As Ks Qs Js 10s (Royal Flush)

Hand: Ah As 10c 7d 6s (One Pair)

Hand: Kh Kc 3s 3h 2d (Two Pair)

Hand: Kh Qh 6h 2h 9h (Flush)

It should handle the following hand ranks:
* Royal Flush
* Straight Flush
* Four of a Kind
* Full House
* Flush
* Straight
* Three of a Kind
* Two Pair
* One Pair
* High Card

</details>
