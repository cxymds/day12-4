'use strict';
module.exports = (sequelize, DataTypes) => {
  const Todo = sequelize.define('Todo', {
    text: DataTypes.STRING,
    complete: DataTypes.BOOLEAN,
    UserId: DataTypes.INTEGER
  }, {});
  Todo.associate = function(models) {
    // associations can be defined here
  };
  return Todo;
};