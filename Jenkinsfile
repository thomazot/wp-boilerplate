pipeline {
  agent none
  stages {
    stage('') {
      steps {
        sh '''yarn
yarn start'''
      }
    }
  }
  environment {
    NAME = 'wordpress'
    DB_DATABASE = 'wordpress'
    DB_USER = 'wordpress'
    DB_PASS = 's032d0s0s23s'
    VHOST = 'wordpress.thomazot.com.br'
    PROXY = 'nginx-net'
  }
}