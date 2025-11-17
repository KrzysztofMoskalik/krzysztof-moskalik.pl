pipeline {
    agent any

    stages {
        stage('Build Container') {
            steps {
                sh 'docker compose up -d --build'
            }
        }
        stage('Upload Image') {
            steps {
                echo env.BRANCH_NAME
                echo 'uploading...'
            }
        }
        stage('Pull & Run Image') {
            steps {
                echo 'Pulling & Running...'
            }
        }
    }
}
