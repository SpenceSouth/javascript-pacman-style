/**
 * Created by Spence on 4/4/2015.
 */

var game = new Phaser.Game(1280, 720, Phaser.AUTO, '', { preload: preload, create: create, update: update });

function preload() {
    game.load.image('sky', 'assets/background.png');
}

function create() {
}

function update() {
}