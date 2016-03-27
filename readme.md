Math Game
=========

A small example of how to start structuring a project. **This is not a secure
or polished product.**


Basic Idea
----------

For a small project like this the file structure doesn't matter much but
projects tend to grow over time. This is an example of how to structure an
application so it is prepared to grow.

The `public` folder only contains files that the browser should be able to
access directly. All requests that PHP handles goes trough `public/index.php`.
It has 3 parts.

*   **Configuration**: General configuration of the whole application. It should
    happen as soon as posible.

*   **Initialization**: Stuff that needs to be initialized on every request. In
    this case session handling.

*   **Routing**: Because all request hits the same file, we need to figure out
    which part of the application shoud actually run.

Most applications follow a version of the MVC (Model-View-Controller)
architecture. MVC is often choosen because it makes the code easier to
understand, maintain, and refactor. The 3 parts are:

*   **Model**: The actual data the application uses. Normally a database layer.
    In this case it just uses the session.

*   **View**: The presentation of the data. Normally som html files where the
    data is inserted into. Lives in the `views` folder.

*   **Controller**: Handles user input and take action based on it. Lives in
    the `controllers` folder.


How To Run
----------

In the terminal go to the folder containing this readme file. On my computer
that is:

    cd /Users/chs/Sites/Education/math-game

Execute the following command:

    php -S 127.0.0.1:8080 -t public server.php

That will start PHPs built-in web server on the local IP `127.0.0.1` and port
`8080`. The document root is set to the `public` folder and every request will
be handled by `server.php`, which should be in the same folder as this readme
file.

You can access the website by going to <http://127.0.0.1:8080> in a web
browser.
