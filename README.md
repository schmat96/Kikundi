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

##Testing

###How to Test:
Call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=all
```

###How to implement a new Test:
1) Create a new File Named: TestClass+Test f.E. TagControllerTest which tests the TagController.
2) Create a new Class with the name TestClass+Test a good example can be found under [Here](https://github.com/schmat96/Kikundi/blob/master/kikundi/controller/TagControllerTest.php)
3) Make sure you call all Test Methods in the constructur, add error-msg to the array and have the following lines at the end of your TestClass:

```
$tct = new TagControllerTest();
if (count ($tct->errors)===0) {
    echo "<h1>Keine Errors in 'YourClass' gefunden.</h1>";
} else {
    echo "<h1 style='background-color: red'>Folgende Errors wurden in 'YourClass' gefunden:</h1>";
    var_dump($tct->errors);
}
```
4) Add your TestClass to the [ProjetController](https://github.com/schmat96/Kikundi/blob/master/kikundi/ProjectController.php) right after the require_once: 

```
else if ($_GET['testing']=='all') {
    require_once 'controller/TagControllerTest.php';
    -->HERE<--
} else
```
5) Test your new TestClass by using the instructions declared under the title 'How to Test'

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
