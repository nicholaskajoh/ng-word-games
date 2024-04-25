# ng-word-games
Word games WordPress plugin.

# To run phptestunit

RUN: docker stop wordpress wpcli db
this command stops all running containers , to list running container run 
RUN: docker -ps
then delete all containers 
RUN: docker rm wordpress wpcli db

RUN: docker compose up to start all the services defined in the docker-compose.yml file.
RUN: docker exec -it wpcli sh
to switch to wpcli 
