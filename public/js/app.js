angular.module('socialgraph', ['ui.router', 'restangular', 'chieffancypants.loadingBar', 'ngAnimate'])

// configuration
.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
  // states
  $urlRouterProvider.otherwise('/');
  $stateProvider.state('home', {
    url: '/',
    templateUrl: 'templates/index.html',
    controller: 'FriendsFinderCtrl',
    resolve: {
      users: function(UsersRepository) {
        return UsersRepository.all();
      }
    }
  });
}])

// controllers
.controller('FriendsFinderCtrl', ['$scope', 'users', 'FriendsRepository', function($scope, users, FriendsRepository) {
  $scope.users = users;
  $scope.friends = [];
  $scope.relations = [
    {
      id: 'friends',
      name: 'Friends'
    },
    {
      id: 'friendsOfFriends',
      name: 'Friends of Friends'
    },
    {
      id: 'suggestedFriends',
      name: 'Suggested Friends'
    }
  ];
  $scope.search = {
    user: null,
    relation: null
  };

  // can user do a search query
  $scope.canNotSearch = function() {
    return !$scope.search.user || !$scope.search.relation;
  };

  // search for relation
  $scope.search = function() {
    if ($scope.canNotSearch()) {
      $scope.friends = [];
      return alert('Please select user and relation first.');
    }

    FriendsRepository[$scope.search.relation]($scope.search.user).then(function(friends) {
      $scope.friends = friends;
    }, function() {
      $scope.friends = [];
    });
  };

}])

// repositories
.factory('UsersRepository', ['Restangular', function(Restangular) {
  return {
    all: function() {
      return Restangular.all('users').getList();
    }
  };
}])
.factory('FriendsRepository', ['Restangular', function(Restangular) {
  return {
    // return user friends
    friends: function(userId) {
      return Restangular.one('users', userId).getList('friends');
    },
    // return user friends of friends
    friendsOfFriends: function(userId) {
      return Restangular.one('users', userId).getList('friends-of-friends');
    },
    // return user suggested friends
    suggestedFriends: function(userId) {
      return Restangular.one('users', userId).getList('suggested-friends');
    },
  };
}]);
