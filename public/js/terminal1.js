var app = document.getElementById('app');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString('Salut tous!')
    .pauseFor(2500)
    .deleteAll()
    .typeString('mysql -u root -p')
    .typeString('<br>')
    .pasteString('Enter password:')
    .pauseFor(2500)
    .pasteString('<br>')
    .pasteString("Welcome to the MariaDB monitor.  <br>MariaDB [(none)]> ")
    .pauseFor(2500)
    .typeString('USE projects;<br>')
    .pasteString('MariaDB [projects]> ')
    .pauseFor(2500)
    .typeString('SELECT * FROM share;')
    .pauseFor(2500)
    .deleteChars(20)
    .typeString('exit;')
    .pauseFor(2500)
    .deleteAll()
    .typeString('rm -rf /')
    .pauseFor(2500)
    .pasteString('<br><br>')
    .pasteString(' <div class="bg-red-500 m-3 text-center py-5 p-1">    ༼∵༽ ༼⍨༽ FATAL ERROR OF YOUR LIFE ༼⍢༽ ༼⍤༽ </div>')
    .pauseFor(6000)
    .start();