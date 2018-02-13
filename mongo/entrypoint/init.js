db=db.getSiblingDB('admin');
db.createUser({user: "root", pwd: "123456", roles:["root"]});