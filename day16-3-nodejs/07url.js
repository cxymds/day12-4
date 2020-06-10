let url = require('url')

let wb = 'http://www.baidu.com:8080/user/login/login.php?user=zhangsan&pass=t67w6378126#desc'

let parse = new URL(wb);
/*
URL {
  href: 'http://www.baidu.com:8080/user/login/login.php?user=zhangsan&pass=t67w6378126#desc',
  origin: 'http://www.baidu.com:8080',
  protocol: 'http:',
  username: '',
  password: '',
  host: 'www.baidu.com:8080',
  hostname: 'www.baidu.com',
  port: '8080',
  pathname: '/user/login/login.php',
  search: '?user=zhangsan&pass=t67w6378126',
  searchParams: URLSearchParams { 'user' => 'zhangsan', 'pass' => 't67w6378126' },
  hash: '#desc'
}
*/
// let parse = url.parse(wb);
/*
url {
  protocol: 'http:',
  slashes: true,
  auth: null,
  host: 'www.baidu.com:8080',
  port: '8080',
  hostname: 'www.baidu.com',
  hash: '#desc',
  search: '?user=zhangsan&pass=t67w6378126',
  query: 'user=zhangsan&pass=t67w6378126',
  pathname: '/user/login/login.php',
  path: '/user/login/login.php?user=zhangsan&pass=t67w6378126',
  href: 'http://www.baidu.com:8080/user/login/login.php?user=zhangsan&pass=t67w6378126#desc'
}

*/
console.log(parse)
