pipeline {
  agent any
  stages {
    stage('error') {
      steps {
        sh '''echo "
NAME=wordpress
DB_DATABASE=wordpress
DB_USER=wordpress
DB_PASS=s032d0s0s23s
VHOST=wordpress.thomazot.com.br
PROXY=proxy_default" > .env'''
      }
    }
  }
}