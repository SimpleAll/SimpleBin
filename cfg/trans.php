;<?php http_response_code(403); /*
; PrivateBin 配置文件
;
; 每个选项的解释可以参考 https://github.com/PrivateBin/PrivateBin/wiki/Configuration.
; 本配置由Senra翻译

[main]
; (可选) 设置一个用于在网站上显示的项目名(网站名)
; name = "PrivateBin"

; 启用或禁用讨论功能(针对Paste内容留言讨论)，默认为true
discussion = true

; 预选讨论功能(是否在创建新的Paste时默认勾选开启讨论)，默认为false
opendiscussion = false

; 启用或禁用密码功能，默认为true
password = true

; 启用或禁用文件上传功能，默认false
fileupload = false

; (是否在创建新的Paste时默认勾选阅后即焚)，默认为false
burnafterreadingselected = false

; 当启用了阅后即焚的Paste被第一次访问后马上进行删除，而不是等待一次成功的解密
; 按照说明，PrivateBin默认在你浏览器成功解密后才会使用js来做一个回调以便删除Paste，这个功能将无视你是否成功解密，直接进行删除
instantburnafterreading = false

; 预选的默认显示模式(在创建新的Paste时默认选择的显示\渲染格式)，默认为"plaintext"(纯文本)
; 请确保这个值存在于[formatter_options]中
defaultformatter = "plaintext"

; (可选) 设置一种代码高亮的主题，可以在 css/prettify/ 目录中查看
; syntaxhighlightingtheme = "sons-of-obsidian"

; 每个Paste或者评论留言的大小限制，单位为bytes，默认是2Mb
sizelimit = 2097152

; 使用的模板，默认是"bootstrap" (tpl/bootstrap.php)
template = "bootstrap"

; (可选) 显示的提示
; notice = "Note: This is a test service: Data may be deleted anytime. Kittens will die if you abuse this service."

; 默认情况下PrivateBin会根据用户的浏览器设置来猜测用户使用的语言，启用该选项将使得用户能够在菜单中选择语言
; 语言的选择记录会以session cookie的形式存储在你的浏览器中，保存到你的浏览器关闭之前
languageselection = false

; 设置默认语言，默认为English
; 如果这个选项被设置了且上一个语言选择功能被关闭，则这将成为唯一的语言
; languagedefault = "en"

; (可选) 链接缩短程序的地址(API)，通过配置这个能在创建新的Paste时同时创建短链以方便使用
; 需要注意的是请选择可靠的或者是自建的短链，因为这会使得短链提供者能够获取你带有加密密钥的完整链接
; urlshortener = "https://shortener.example.com/api?link="

; (可选) 是用户能够一键生成一个用于分享Paste链接的二维码
; 这个会对你创建Paste以及浏览Paste的页面同时生效
; qrcode = true

; (可选) 使用基于IP的评论头像来区分一条评论是否是来自于一个使用了相同的用户名的不同用户是一个比较差劲的机制。
; 因为这种情况下如果服务器的salt泄露，可以通过为IP生成彩虹版的方式来碰撞获得所有非匿名的评论者的IP
; 这个选项可以被设置为 none / vizhash / identicon(默认)
; icon = none

; Content Security Policy(CSP)这个HTTP头允许网站限制什么内容可以在它的页面加载(用于防止插入恶意内容)
; 如果你修改模板来添加第三方域名的自定义脚本(比如追踪脚本或者使用了某些抗D服务)，你可能需要修改这个。
; 可以参考 https://content-security-policy.com/ 来配置
; 注意: 如果你使用bootstrap主题，你可以去除sandbox限制中的allow-popups
; cspheader = "default-src 'none'; manifest-src 'self'; connect-src *; form-action 'none'; script-src 'self'; style-src 'self'; font-src 'self'; img-src 'self' data:; referrer no-referrer; sandbox allow-same-origin allow-scripts allow-forms allow-popups"

; 和PrivateBin Alpha 0.19保持兼容，会导致降低一定的安全性
; 如果启用这项，将使用base64.js的1.7版本，而不是2.1.9版本，并且在HMAC中将使用sha1而不是sha256(用于生成删除Paste的token)
zerobincompatibility = false

[expire]
; 预选的过期时间(创建新的Paste时默认选择的过期时间)，请确保这个值存在于[expire_options]中
default = "1week"

; (可选) 克隆按钮可以在过期的Pastes中关闭，但是请注意这只是隐藏了按钮，复制和粘贴还是可能的
; clone = false

[expire_options]
; 为每个过期的时间段设置具体的秒数，0代表永不过期
5min = 300
10min = 600
1hour = 3600
1day = 86400
1week = 604800
; 这个一个月只有30天，所以不算准确
1month = 2592000
1year = 31536000
never = 0

[formatter_options]
; 设置可选的格式(用于渲染和显示)，它们的顺序和标签
plaintext = "Plain Text"
syntaxhighlighting = "Source Code"
markdown = "Markdown"

[traffic]
; 同一个IP的访问频率限制，单位为秒，设为0代表禁用
limit = 10

; (可选) 如果你的网站运行在一个反代或者负载均衡之后，设置包含用户IP的HTTP头可以将用户正确的IP传递给程序
; header = "X_FORWARDED_FOR"

; 存储访问频率限制的目录
dir = PATH "data"

[purge]
; 清除过期Paste的最小时间间隔，清除只会在创建Paste的时候触发，设为0代表每次创建都进行清除
limit = 300

; 清除过期Paste一次最多删除的Paste数量，设为0代表禁用清除。如果网站使用人数较多建议把这个值设置的稍微大点
batchsize = 10

; 存储清除频率限制的目录
dir = PATH "data"

[model]
; 加载的模型类(指定了把数据存哪)，以及存储用的目录
; 默认的模型"Filesystem"(文件系统)将所有数据都直接存储在文件中
class = Filesystem
[model_options]
dir = PATH "data"

;[model]
; 使用MySQL存储的配置示例
;class = Database
;[model_options]
;dsn = "mysql:host=localhost;dbname=privatebin;charset=UTF8"
;tbl = "privatebin_" ; table prefix
;usr = "privatebin"
;pwd = "Z3r0P4ss"
;opt[12] = true ; PDO::ATTR_PERSISTENT

;[model]
; 使用SQLite存储的配置示例
;class = Database
;[model_options]
;dsn = "sqlite:" PATH "data/db.sq3"
;usr = null
;pwd = null
;opt[12] = true ; PDO::ATTR_PERSISTENT
