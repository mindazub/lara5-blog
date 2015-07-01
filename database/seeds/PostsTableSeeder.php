<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
        	'title'=>'The Best Resources For Web Developer',
        	'author_id'=>'1',
        	'body'=>'www.toptal.com/blog, www.fossbytes.com, www.sitepoint.com, www.learninglaravel.net, www.laracasts.com, https://mattstauffer.co/',
        	'slug'=>'the-best-resources-for-web-developers'
        	]);
        Post::create([
        	'title'=>'CEO Blog – On Creating Products',
        	'author_id'=>'1',
        	'body'=>'I’ll start by saying this could be a single post or it might be a series, depends on my time, ability to devote attention to this and more importantly on how we’re going with our new product!

So for a couple of months now we’ve been on a pretty awesome ride creating the first entirely new product that we’ve released into the market for a couple of years. Originally my title for this article was “On creating (great) products…” – I ended up deciding that might be a bit premature given we’re not even released yet!

I did want to jot down some thoughts on the process and learnings that I’ve personally noted along the way (might be because I actually learnt something, alternatively might be because I find it psychologically cathartic!).',
        	'slug'=>'ceo-blog-on-creating-products'
        	]);
        Post::create([
        	'title'=>'Real-time Apps with Laravel 5.1 and Event Broadcasting',
        	'author_id'=>'1',
        	'body'=>'In Laravel 5.1, the framework includes functionality called broadcasting events that makes it easy to create real-time apps in PHP. With this new functionality, an app can publish events to various cloud-based real-time PubSub solutions, like Pusher, or to Redis.',
        	'slug'=>'real-time-apps-with-laravel-5-1'
        	]);
        Post::create([
        	'title'=>'Sublime Text 3 for PHP Developers',
        	'author_id'=>'1',
        	'body'=>'Posted on June 26, 2015 | By Matt Stauffer
 

A lot of folks in the PHP community have been checking out PHPStorm lately, including myself and most of the developers I work with. We love the code intelligence we get from PHPStorm, but still miss the speed, quick boot-up, and convenience of Sublime Text.

Before I blindly assume PHPStorm is the only way to go, I wanted to see: Can I bring the things a PHP-focused IDE provides PHP developers back to Sublime Text and get the best of both worlds?

Let\'s start with a quick list of ways that PHPStorm really sets itself apart for me. Please note: There are a million other features that PHPStorm uniquely offers, but to be honest, it\'s the tiny little conveniences that I\'ve seen provide the biggest boost in efficiency.

Also note: This is Sublime Text 3 we're talking about.

My Must-Haves From PHPStorm #
Without most of these wonderful PHP-focused features, it'll be hard to recommend using something other than PHPStorm, even if it's slower and costlier and uses more memory. So. Can we reproduce them in Sublime Text?

Auto-use (import) of classes
Class FQCN inline completion
Easily navigate to a symbol's definition
Easy constructor injection
Highlight unused imports
Git gutters
Code sniffing/PSR-2 validation
Code Completion: PHP
Code Completion: project code
Package Control #
Before we talk about anything else, you at least need to know how to install packages in Sublime Text.

If you haven't yet, Go install Package Control now.

Unless otherwise specified, every package after this should be installed using Package Control.

Sublime PHP Companion #
The most significantly PHP-focused package for Sublime Text is called Sublime PHP Companion.

Like most packages, it contains a series of actions you can perform. They're mapped to certain keys by default, but you can always re-map them.

find_use (F10) - When your cursor is over a class name, this command makes it simple to use(import) that class. find_use
expand_fqcn (F9) - Same as find_use but instead of expanding the class in the import block, it expands its FQCN inline. expand_fqcn
import_namespace (F8) - Adds the namespace for the current file based on the file's path.
goto_definition_scope (shift+F12) - Same as Sublime Text's native goto_definition(described below), but scoped in a PHP-aware manner.
The package isn't perfect, and it is clearly not as bright as PHPStorm is when it comes to detecting namespaces and parsing some weird edge cases. But for day-to-day work, this is a huge boost in the PHP-code-knowledge area.

AllAutocomplete #
Sublime PHP Companion doesn't sniff your classes and give you autocompletion, sadly, butSublimeAllAutocomplete does register the names of all symbols (functions, classes, etc.) in any files you have open in other tabs and add those to the autocomplete register.

This isn't quite the same as full userland-code-sensitive autocompletion, but it helps a lot.

AllAutocomplete demonstration

Cmd-click for function definition #
Sublime PHP Companion makes it easy to right click on functions and go to their definitions, but this shortcut brings back PHPStorm's CMD-click-to-definition. FYI, in Sublime Text CMD (or windows' ctrl key or whatever it is on other systems) is called "Super".

First, create a user mousemap file. If you don't have one, go here:

Linux
Create Default (Linux).sublime-mousemap in ~/.config/sublime-text-3/Packages/User

Mac
Create Default (OSX).sublime-mousemap in~/Library/Application Support/Sublime Text 3/Packages/User

Windows
Create Default (Windows).sublime-mousemap in %appdata%\Sublime Text 3\Packages\User

Next, place this in the file:

[
    {
        "button": "button1", 
        "count": 1, 
        "modifiers": ["ctrl"],
        "press_command": "drag_select",
        "command": "goto_definition"
    }
]
You just taught Sublime Text this: "when I hold ctrl and click button one, fire the goto_definitioncommand." Done! (original source)

ST Click to definition

Note: I originally wanted to suggest using the super modifier, so it would be just like PHPStorm; however, that would override Sublime Text's "hold super and click to get multiple cursors" behavior, so I didn't.
Code sniffing and PHP_CodeSniffer #
Sublime PHPCS #
There\'s a package named Sublime PHPCS that brings PHP_CodeSniffer, PHP's linter, PHP Mess Detector, and Scheck (?) to bear on your code.

You can tweak all sorts of settings, but you\'re primarily either going to run it every time you save your file (good, but can get annoying), or every time you trigger it from the command palette (presssuper-shift-p and then type until you get "PHP Code Sniffer: Sniff this file") or keyboard shortcut (ctrl-super-shift-s by default).

You\'ll get gutter highlights and a list up top of all of the places your code doesn't satisfy the linter.

Note that this and any other packages that rely on code sniffing and linting will be requiring command line applications installed, so be sure to visit their sites and read their directions.

PHP_CodeSniffer Sublime Text 2/3 Plugin #
Interestingly, there\'s a relatively un-noticed plugin doing the same thing (but for PHPCS only) that's written by the same group that wrote PHP CodeSniffer, so it might be worth checking out as well; it's called PHP_CodeSniffer Sublime Text 2/3 Plugin (creative, I know.)

I\'ve never used this one, though, so proceed with caution.

Mike Francis PHP CS Fixer Build Script #
Mike Francis also shared a custom build script he wrote that runs PHP-CS-Fixer on your code whenever you trigger it. That means it'll actually enforce PSR-2 (or whatever other PHP-CS-Fixer standard you pass it) on your code for you.

Taylor Otwell actually shared this same script with me, but he didn't write it up as nicely as Mike did. :) He did, however, mention that you might want to set this preference: "show_panel_on_build": false,This'll keep it from popping out the command panel with your results every time, which can get very irritating very quickly.

SublimeLinter #
SublimeLinter PHP (and its required dependency, SublimeLinter) rely on PHP's built-in linter (just like the Sublime PHPCS plugin above). This is a simpler version that only runs the linter, nothing else.

DocBlockr #
If you're the type to use PHPStorm, there's a greater chance that you're the type to write Doc blocks. (Just sayin').

DocBlockr makes it simple to create new doc blocks, but more importantly, if you create a doc block just above a defined function, it will extract that function's parameter information and pre-fill it in your doc block. Boom.

DocBlockr in action

Git helpers #
Sublime Text Git #
Are you the type that hates switching from your IDE to your terminal/Git client? Sublime Text Gitprovides access to many Git commands directly from the Sublime Text command palette.

GitGutter #
GitGutter shows you diff information regarding each line's status--has it been modified, inserted, or deleted?

This is not nearly as powerful as PHPStorm's Git gutters, but it's a step in the right direction.

GitGutter

Syntax Highlighting #
PHP-Twig for Twig
Laravel Blade Highlighter for Laravel Blade
Bracket Highlighting - shows the start and end bracket in the gutter for the block your cursor is currently in
PHPUnit Build #
There's a great plugin that makes it super easy to run PHPUnit from the command palette or a keyboard shortcut: SimplePHPUnit

Just like the name implies, you install the package and you're up and running.

CodeIntel #
CodeIntel is supposed to provide Sublime Text intelligence about the language you're working in. It should provide autocompletion, easy jump-to-definition, and information about the function you're currently working in.

Why do I keep saying "should" and "supposed to"? Because I have yet to meet a PHP developer who can get CodeIntel up and running consistently and predictably. Have you? Hit me up.

Other Plugins #
When I asked around on Twitter, plenty of folks shared plugins. Since I don't use these, I can only share them vaguely, but I'm sure they're all worth a quick check.

ApplySyntax extends Sublime Text's ability to determine which syntax to apply to your current file
DashDoc makes it easy for Mac users with the Dash application to look up any word in Dash
Function Name Display adds information to the status bar about the current file, class, and function/method name
phpfmt looks like an alternative to PHP CS Fixer
CodeComplice is code intel, but newer—maybe this is the solution?!
Xdebug Client
EditorConfig is a standard to share particular editor configuration patterns for each project. This plugin lets you import and use them in Sublime Text. (learn more about the EditorConfig format)
SublimePrettyJSON is great for quickly formatting JSON
CaseConversion makes it simple to convert between snake_case and camelCase and PascalCase and split and join words and everything else.
CodeBug for Xdebug #
Do you miss the Xdebug integration in PHPStorm? Check out Codebug, a standalone xdebug client.

Codebug Screenshot

A Few General Sublime Text Tips #
This post is not an introduction to all things Sublime Text, but I do want to cover a few important pieces here.

Finding files with "Goto Anything" (cmd-p) #
If you press super-P you'll get the wildly powerful Goto Anything palette, which allows you to easily find files, but you can go a bit further: if you find your file (e.g. by typing Handler.php), you can also trigger opening it at a certain line (Handler.php:35) or at a certain symbol (Handler.php@report).

Goto Anything

Finding commands with the Command Palette (cmd-shift-p) #
While the Goto Anything palette lets you search for files in your project, the Command Palette allows you to search for commands.

This means that any command that Sublime Text lets you perform (run builds, rename files, etc.), but also those from third-party packages (Sniff this file, etc.) can be run purely from the keyboard, even if you don't know (or have) the keyboard shortcut.

Command Palette

Finding symbols with "Goto Symbols" (cmd-r) #
If you press super-R you\'ll get the Goto Symbol palette, which will navigate to any symbol in your current file.

Symbols are things like classes, methods, or functions.

Goto Symbols

Multiple cursors #
Many editors have added multiple cursors, but Sublime Text still does it the best.

If you\'ve never tried it, go learn about it somewhere, but here's a quick intro:

Open up a file. Hold "super" (cmd on Mac) and click several places around the file. Now start typing. BOOM.

Another great trick: Place your cursor on a common word (for example, a variable name). Now pressSuper-D a few times. You now have several instances of that variable selected and you can manipulate them all at once.

Multiple selection

Or, select five lines and press Super-shift-l. Check it.

There\'s a lot more you can do with this if you get creative.

Fuzzy matching #
Did you know that when you\'re using any of the command palettes in Sublime Text, you don't have to finish one word?

In most editors (like PHPStorm), if you wanted to find a file namedresources/views/conferences/edit.blade.php, you could typeresources/views/conferences/edit.blade.php or conferences/edit.blade.php, but in Sublime Text all you would need is something like resvieconedblp. Just type enough that the order of letters you're typing could only exist in the string you're looking for, and you'll be good to go. Skip a letter here, skip a slash there--no problem.

Sublime Text Fuzzy Matching

Miscellany #
There's a lot more to learn about how Sublime Text works, and a lot of tools and courses available to you. This is not a comprehensive resource for everything that's great about Sublime; those guides have already been written.

If you want to learn more about Sublime Text, there are two excellent resources I'd consider checking out.

Sublime Text Power User is a book and video series by my friend Wes Bos that teaches you everything you need to use Sublime Text like a boss. It's the easiest way for someone new to Sublime Text to get up and running quickly. Also, I reached out to Wes and he gave me a GEEKcoupon to get you $10 off (disclaimer: it helps me out, too.)
ShortcutFoo is a great resource for learning keyboard shortcuts for any environment. They've got programs for everything from Vim to Sublime Text to Photoshop to Excel.
The Verdict #
Let's take a look at our list and see what we've handled:

Class FQCN inline completion (Sublime PHP Companion)
Easily navigate to a symbol's definition (Sublime PHP Companion)
Navigate to a symbol's definition (Sublime PHP Companion)
Easy constructor injection (Macro?)
Highlight unused imports (SublimeLinter)
Git gutters (GitGutter)
Code sniffing/PSR-2 validation (SublimePHPCS etc.)
Code Completion: PHP
Code Completion: project code
Not bad, actually. Let's talk about what's missing:

Construction injection (e.g. simplifying injecting a property into the constructer as a property, setting it in the constructor, and defining the class property) is something I think can be solved with a clever macro—but I haven't seen that clever macro yet.
CodeIntel purports to offer PHP code completion, so it's just a matter of getting that working. But I don't think (correct me if I'm wrong) anything in the Sublime Text world claims to sniff the definitions of your code and then provide autocompletion and parameter suggestion. So that's a big shortcoming for sure. Note, however: AllAutocomplete definitely relieves this pain a little.
What's my verdict? As always, it depends. I think it'll depend some on the project, some on the developer, and some on whether or not I can find solutions to some of the issues above. But I'm definitely leaning on Sublime Text a lot more than I was six months ago—it's just so darn fast.

Postscript #
Are there any Sublime Text tips for PHP developers that I missed? Let me know on Twitter.

Are there any PHPStorm features that I didn't cover here that you think are vital to every developer's toolkit? Let me know that too.

Also: I couldn't've written this without Adam Wathan, Taylor Otwell, Jeffrey Way, and many, many other friends on Twitter.',
        	'slug'=>'sublime-text-3-for-php-developers'
        	]);  
    }
}
