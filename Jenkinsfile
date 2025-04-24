pipeline {
    agent any
    environment {
        server_ip = '3.111.35.98'
        server_key = 'asdf' //jenkins cred id.
        deploy_dir = '/var/www/clean-news-site'
        project_script = '/var/www/clean-news-site/project.sh'
        git_repo = 'https://github.com/aryamanditinus/clean-news-site.git'
        branch = 'dev'
        email_to = 'aryaman@ditinustechnology.com'
    }
    
    stages {
        stage ('run pipeline script') {
            steps {
                script {
                    withCredentials([sshUserPrivateKey(credentialsId: "${env.server_key}", keyFileVariable: 'identity', userNameVariable: 'userName')]) {
                        def remote = [
                            name: 'remote-server',
                            host: server_ip,
                            user: userName,
                            identityFile: identity,
                            allowAnyHosts: true
                        ]
                         sshCommand remote: remote, command: "bash ${script_path}"
                    }
                }
            }
        }
    }
}
