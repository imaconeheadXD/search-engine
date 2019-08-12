const request = require('request');
const cheerio = require('cheerio');
const fs = require('fs');
var iter = 0;
const URL = "https://www.google.com";
const arr = [];
var mysql = require('mysql');
var sql_input;
var connection = mysql.createConnection({
host: '149.4.211.180',
database: 'jami2497',
user: 'jami2497',
password: '23472497'
});

function extract(err, res, body) {
if(err){
console.log(err, "error occured while hitting URL");
}
else {
var $ = cheerio.load(body); //Loading of compare HTML body
$('h1').each(function(index, header1){
const term = $(header1).text();
console.log(term);
});
$('h2').each(function(index, header2){
const term = $(header2).text();
console.log(term);
});
$('h3').each(function(index, header3){
const term = $(header3).text();
console.log(term);
});
$('h4').each(function(index, header4){
const term = $(header4).text();
console.log(term);
});
$('h5').each(function(index, header5){
const term = $(header5).text();
console.log(term);
});
$('h6').each(function(index, header6){
const term = $(header6).text();
console.log(term);
});
$('a').each(function(index, atag){
const link = $(atag).attr('href');
const name = $(atag).text();
if (link.substring(0,4)=="http"){
	
var object = {
link : link,
name : name,
}
console.log(object.link);
arr.push(/*JSON.stringify(*/object);}
});
console.log("link is : " + arr[iter].link);
var entry = 'INSERT INTO searchResults (url,title,description) VALUES("' +
arr[iter].link + '","' + arr[iter].name + '","test")';
var qry = connection.query(entry, function(err,result){
console.log(result);
            if (err) throw err;
});
request(arr[iter++].link, (err, res, body) => { extract(err,res,body)});
};
}

function cycleURL(err, res) {
if(err){
console.log(err, "error occured while hitting URL");
}
else {

}
}

request(URL, (err, res, body) => { extract(err,res,body)});