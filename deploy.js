var FtpDeploy = require('ftp-deploy');
var ftpDeploy = new FtpDeploy();
var args = process.argv.slice(2);

console.log(process.env);

var config = {
    username: process.env.USER,
    host: "ftp.oxytours.com",
    password: process.env.PASS,
    port: 21,
    localRoot: __dirname + "/static",
    remoteRoot: "/web/",
    exclude: ['.git', '.idea', 'tmp/*']
}

var config_mobile = {
    username: process.env.USER,
    host: "ftp.oxytours.com",
    password: process.env.PASS,
    port: 21,
    localRoot: __dirname + "/mobile",
    remoteRoot: "/web/mobile",
    exclude: ['.git', '.idea', 'tmp/*']
}

if(args[0] === 'desktop') {
  ftpDeploy.deploy(config, function(err) {
      if (err) console.log(err)
      else console.log('finished');
  });
} else if (args[0] === 'mobile') {
  ftpDeploy.deploy(config_mobile, function(err) {
      if (err) console.log(err)
      else console.log('finished');
  });
}

ftpDeploy.on('uploading', function(data) {
    process.stdout.write(`Uploading ${args[0]}: ${data.percentComplete}% complete\r`);
});
