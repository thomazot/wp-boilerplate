pipeline {
  agent any
  stages {
    stage('') {
      steps {
        sh '''cat <<EOF
NAME=wordpress
DB_DATABASE=wordpress
DB_USER=wordpress
DB_PASS=s032d0s0s23s
VHOST=wordpress.thomazot.com.br
PROXY=proxy_default
EOF > .env

yarn
yarn start'''
      }
    }
  }
}