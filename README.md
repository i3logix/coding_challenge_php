# Coway's Game of Life challenge



## TODO List

* thoroughly review tests :heavy_check_mark:

* run tests - expecting 100% failure :heavy_check_mark:

	* actual `Tests: 3, Assertions: 4, Failures: 2.`

* create stubbed methods with documentation :heavy_check_mark:

* test expecting passes :heavy_check_mark:

* fill in methods :heavy_check_mark:

	* work on game main game logic :heavy_check_mark:

	* work on changing the window of the board :heavy_check_mark:

	* create additional tests :heavy_check_mark:

* test using PHP 7.2 :heavy_check_mark:

* dockerize w/ PHP 5.6 (5.3 isn't available) :heavy_check_mark:

* test using PHP 5.6 :exclamation:
	* The version of PHPUnit listed in `composer.json` is for PHP 7.1+
	* Leaving docker items in for reuse later.

* update documentation :heavy_check_mark:


## Explanation
### The Game of Life

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



## Install & Usage

This repository includes a `composer.json` file which will install PHPUnit. [If you don't have composer, you can find instructions on installing it here.](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) It also includes a default phpunit configuration. After running `composer install` you should be able to run:

-  `composer test-gol` (Runs tests for all the **The Game of Life** challenge)
