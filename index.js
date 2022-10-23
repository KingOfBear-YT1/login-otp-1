// memanggil modul http
const http = require('http');

// memanggil modul fs
const fs = require('fs');

// membuat fungsi panggil HTML
function panggilPHP(path, res){
    fs.readFile(path, 'utf8', function(err, data){
        // jika error
        if(err){
            res.writeHead(404);
            res.write('<h1>File tidak ditemukan!</h1>');
        }
        else{
            res.write(data);
        }
        // untuk mengakhiri response 
        res.end();
    });
}

// membuat server
const server = http.createServer(function(req,res){
    res.writeHead(200,{'Content-Type' : 'text/php'});

    // memanggil fungsi panggilHTML
    panggilPHP('./login-user.php',res);  
});

server.listen(3000);
