# Kikundi

## Usage so far

You can call this link to add a new Admin with the given Name:
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=createProjectPool&sessionID=1&name=MaxesPool&adminName=Max
```
This will create a new Admin, if you need to double check this call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=true
```
Now you can create a new Member which needs to tell the application in which Pool (or rather the admin hash code, found in the link above) he wants to join (hashCode=***)
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=registerMember&hashCode=1KIKMax&name=NeuerMember&sessionID=111
```
Congrats! You created a new Member! Call now this link and create a new project. The  sessionID must be set to the MembersID, found under ProjectController with GET['testing'] set to anything.
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=createProject&maxMembers=4&minMembers=4&difficulty=3&name=asd&description=doppelASD&tags=nope&sessionID=3KIKNeuerMember
```

If you need to reset the Pools you can call
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=reset
```
### Installing



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
