# 使用官方PHP镜像作为基础镜像，确保版本与Laravel 9兼容
FROM php:8.1-fpm-alpine3.21

# Alpine 替换为中科大镜像源
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories
RUN apk update && apk add libxslt-dev

#  替换为中科大镜像源
# RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list && \
#     sed -i 's#http://archive.ubuntu.com/#http://mirrors.ustc.edu.cn/#g' /etc/apt/sources.list

# 安装必要的PHP扩展
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install xsl

# 安装Laravel所需的扩展

RUN pecl channel-update pecl.php.net

# 安装Nginx
RUN apk update && apk add nginx

# 将项目文件从宿主机复制到容器中
COPY . /var/www/html

# RUN addgroup -g 82 -S www-data \
#     && adduser -u 82 -D -S -G www-data www-data
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage
# 配置Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# 设置工作目录
WORKDIR /var/www/html

# 暴露80端口
EXPOSE 80

# 启动Nginx和PHP-FPM服务
CMD ["sh", "-c", "nginx && php-fpm"]
