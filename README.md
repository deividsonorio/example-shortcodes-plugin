<p>
<img src="https://img.shields.io/static/v1?label=STATUS&message=IN%20DEVELOPMENT&color=GREEN"/>
<img src="https://img.shields.io/static/v1?label=licene&message=GNU&color=green" />
</p>

# WordPress plugin example - shortcodes

WordPress plugin example, adding some shortcodes that can be used in pages and posts.

## Shortcodes available
- **[hello_world]**
- **[upside_down]**
- **[bouncy_logo]**
- **[random_joke]**

## Shortcodes description

### Hello World
```
[hello_world]
```
Display a text "Hello Wordl!".

![Screenshot hello world](./readme_images/hello-world.png?raw=true "Screenshot Hello World")

<br>

### Upside Down
```
[upside_down]
```
Turn the page upside down.

![Screenshot upside down](./readme_images/upside-down.png?raw=true "Screenshot Upside Down")

<br>

### Bouncy logo
```
[bouncy_logo]
```
Adds a bouncing logo to the page, like the old DVD players screensavers.

![Screenshot bouncy logo](./readme_images/bouncy.gif?raw=true "Screenshot Bouncy Logo")

This shortcode can receive a parameter ***<span style="color:orange">image</span>***. If it's not defined, a WordPress logo will be used.

Example:
```
[bouncy_logo image="https://cdn.pixabay.com/photo/2017/03/05/21/55/emoticon-2120024_960_720.png"]
```

![Screenshot bouncy logo](./readme_images/bouncy-emoji.gif?raw=true "Screenshot Bouncy Logo")

<br>

### Random joke
```
[random_joke]
```
Display a random joke at every page load.

![Screenshot joke](./readme_images/joke.png?raw=true "Screenshot Joke")

This shortcode can receive a parameter ***<span style="color:orange">type</span>***, that is the type of the joke to be displayed. 

If it's not defined, the type of the joke will also be random.

**Possible paramaters:**

- Programming
- Misc
- Dark
- Pun
- Spooky
- Christmas

Example:
```
[random_joke type="Spooky"]
```
