<?php

namespace Weisl\EFrontSDK;

use Weisl\EFrontSDK\Helper\eFrontProSDK;
use Weisl\EFrontSDK\Helper\Factory\Handler\API as Api;
use Weisl\EFrontSDK\Helper\Request\Handler\cURL as cURL;

/**
 * Class EFrontAPI serves as wrapper for the API.
 *
 * @author  Kilian Weisl
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class EFrontAPI
{
  /**
   * The API object.
   *
   * @since 1.0.0
   *
   * @var eFrontProSDK
   */
  private $api;

  /**
   * Constructs the API Wrapper.
   *
   * @since 1.0.0
   *
   * @param string $apiVersion  (Required) | The API version to be used.
   * @param string $apiLocation (Required) | The API location.
   * @param string $apiKey      (Required) | The API key to be used.
   * 
   */
  public function __construct($apiVersion, $apiLocation, $apiKey)
  {
    $this->api = new eFrontProSDK(new Api(new cUrl));
    $this->api->Config($apiVersion, $apiLocation, $apiKey);
  }

  /**
   * Returns the actual API to perform calls.
   *
   * @since 1.0.0
   *
   * @return eFrontProSDK 
   */
  public function get()
  {
    return $this->api;
  }

  /**
   * Returns whether a user exists or not by providing the login 
   * name and the password.
   * 
   * POST /Account/Status
   * SDK: GetAPI('Account')->Exists($loginName, $password)
   * 
   * @since 1.0.4
   * 
   * @param string $loginName (Required) | The login name of the user.
   * @param string $password (Required) | The password of the user.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function loginUser($loginName, $password)
  {
    return $this->get()->GetAPI('Account')->Exists($loginName, $password);
  }

  /**
   * Creates a branch.
   * 
   * POST /Branch
   * SDK: GetAPI('Branch')->Create($branchInfo)
   * 
   * @since 1.0.4
   * 
   * @param array $branchInfo (Required) | The branch information.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function createBranch($branchInfo)
  {
    return $this->get()->GetAPI('Branch')->Create($branchInfo);
  }

  /**
   * Returns information about the requested branch.
   * 
   * GET /Branch/{Id}
   * SDK: GetAPI('Branch')->GetInfo($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The branch identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getBranchInfoById($id)
  {
    return $this->get()->GetAPI('Branch')->GetInfo($id);
  }

  /**
   * Returns the complete list of branches
   * 
   * GET /Branches
   * SDK: GetAPI('BranchList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllBranches()
  {
    return $this->get()->GetAPI('BranchList')->GetAll();
  }

  /**
   * Creates a relation between the requested user and branch.
   * 
   * PUT /Branch/{Id}/AddUser
   * SDK: GetAPI('BranchUser')->AddRelation($userId, $branchId)
   * 
   * @since 1.0.4
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $branchId (Required) | The branch identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToBranch($userId, $branchId)
  {
    return $this->get()->GetAPI('BranchUser')->AddRelation($userId, $branchId);
  }

  /**
   * Adds a user to a branch via POST method.
   * 
   * POST /Branch/AddUser
   * SDK: GetAPI('BranchUser')->AddUser($userId, $branchId)
   * 
   * @since 1.0.4
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $branchId (Required) | The branch identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToBranchViaPost($userId, $branchId)
  {
    return $this->get()->GetAPI('BranchUser')->AddUser($userId, $branchId);
  }

  /**
   * Returns the course catalog for a given user.
   * 
   * GET /User/{Id}/Catalog
   * SDK: GetAPI('Catalog')->GetInfo($userId)
   * 
   * @since 1.0.4
   *
   * @param mixed $userId   (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getCourseCatalogForUserById($userId)
  {
    return $this->get()->GetAPI('Catalog')->GetInfo($userId);
  }

  /**
   * Returns information about the requested category.
   * 
   * GET /Category/{Id}
   * SDK: GetAPI('Category')->GetInfo($id)
   * 
   * @since 1.0.4
   *
   * @param mixed $id (Required) | The category identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getCategoryById($id)
  {
    return $this->get()->GetAPI('Category')->GetInfo($id);
  }

  /**
   * Returns the complete list of categories.
   * 
   * GET /Categories
   * SDK: GetAPI('CategoryList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllCategories()
  {
    return $this->get()->GetAPI('CategoryList')->GetAll();
  }

  /**
   * Returns information about the requested content.
   * 
   * GET /Content/{Id}
   * SDK: GetAPI('Content')->GetInfo($id)
   * 
   * @since 1.0.4
   *
   * @param mixed $id (Required) | The content identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getContentById($id)
  {
    return $this->get()->GetAPI('Content')->GetInfo($id);
  }

  /**
   * Returns information about the requested course.
   * 
   * GET /Course/{Id}
   * SDK: GetAPI('Course')->GetInfo($id)
   * 
   * @since 1.0.4
   *
   * @param mixed $id (Required) | The course identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getCourseById($id)
  {
    return $this->get()->GetAPI('Course')->GetInfo($id);
  }

  /**
   * Returns a list of the training sessions that 
   * belongs to the requested course.
   * 
   * GET /course/{id}/training-sessions
   * SDK: GetAPI('Course')->GetTrainingSessions($id)
   * 
   * @since 1.0.4
   *
   * @param mixed $courseId (Required) | The course identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getTrainingSessionsForCourseById($courseId)
  {
    return $this->get()->GetAPI('Course')->GetTrainingSessions($courseId);
  }

  /**
   * Returns the content IDs for a given course.
   * 
   * GET /Course/{Id}/Content
   * SDK: GetAPI('Course')->GetContentIdsForCourse($id)
   * 
   * @since 1.0.4
   *
   * @param mixed $courseId (Required) | The course identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getContentIdsForCourseById($courseId)
  {
    return $this->get()->GetAPI('Course')->GetContentIdsForCourse($courseId);
  }

  /**
   * Creates a course.
   * 
   * POST /Course
   * SDK: GetAPI('Course')->Create($courseInfo)
   * 
   * @since 1.0.4
   *
   * @param mixed $courseInfo (Required) | The course information.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function createCourse($courseInfo)
  {
    return $this->get()->GetAPI('Course')->Create($courseInfo);
  }

  /**
   * Returns the complete list of courses.
   * 
   * GET /Courses
   * SDK: GetAPI('CourseList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllCourses()
  {
    return $this->get()->GetAPI('CourseList')->GetAll();
  }

  /**
   * Creates a relation between the requested user and course.
   * 
   * PUT /Course/{Id}/AddUser
   * SDK: GetAPI('CourseUser')->AddRelation($userId, $courseId, $force = false)
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param bool  $force    (Required) | Whether to force the operation, or not.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToCourse($userId, $courseId, $force = false)
  {
    return $this->get()->GetAPI('CourseUser')->AddRelation($userId, $courseId, $force);
  }

  /**
   * Adds a user to a course via POST method.
   * 
   * POST /Course/AddUser
   * SDK: GetAPI('CourseUser')->AddRelationWithPost($courseId, $userId)
   * 
   * @since 1.0.4
   * 
   * @param mixed $courseId (Required) | The course identifier.
   * @param mixed $userId   (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToCourseViaPost($courseId, $userId)
  {
    return $this->get()->GetAPI('CourseUser')->AddRelationWithPost($courseId, $userId);
  }

  /**
   * Returns the status of the requested user into the requested course.
   * 
   * GET /CourseUserStatus/{CourseId},{UserId}
   * SDK: GetAPI('CourseUser')->CheckStatus($userId, $courseId)
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getCourseStatusForUser($userId, $courseId)
  {
    return $this->get()->GetAPI('CourseUser')->CheckStatus($userId, $courseId);
  }

  /**
   * Removes the relation between the requested user and the course.
   * 
   * PUT /Course/{Id}/RemoveUser
   * SDK: GetAPI('CourseUser')->RemoveRelation($userId, $courseId, $force = false)
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param bool  $force    (Required) | Whether to force the operation, or not.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function removeUserFromCourse($userId, $courseId, $force = false)
  {
    return $this->get()->GetAPI('CourseUser')->RemoveRelation($userId, $courseId, $force);
  }

  /**
   * Update the status of the specified user in the specified course.
   * 
   * POST /CourseUserStatus/{CourseId},{UserId}
   * SDK: GetAPI('CourseUser')->UpdateStatus($userId, $courseId, array $info = [])
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param array $info     (Optional) | The information to update.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function updateStatusOfUserInCourse($userId, $courseId, array $info = [])
  {
    return $this->get()->GetAPI('CourseUser')->UpdateStatus($userId, $courseId, $info);
  }

  /**
   * Update the status of the specified user in the specified course.
   * 
   * POST /CourseUserStatus
   * SDK: GetAPI('CourseUser')->UpdateStatusWithArray(array $info)
   * 
   * @since 1.0.4
   * 
   * @param array $info | The information to update.
   * Must include 'courseId' and 'userId' as keys.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function updateStatusOfUserInCourseWithArray(array $info)
  {
    return $this->get()->GetAPI('CourseUser')->UpdateStatusWithArray($info);
  }

  /**
   * Returns information about the progress of the specified user in the 
   * specified course.
   * 
   * GET /Course/{CourseId}/UserProgress/{UserId} 
   * SDK: GetAPI('CourseUser')->GetUserProgressForCourse($courseId, $userId)
   * 
   * @since 1.0.4
   * 
   * @param mixed $courseId   (Required)  | The course identifier.
   * @param mixed $userId     (Required)  | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getUserProgressForCourse($courseId, $userId)
  {
    return $this->get()->GetAPI('CourseUser')->GetUserProgressForCourse($courseId, $userId);
  }

  /**
   * Returns a list of all the test attempts that the specified user has made in 
   * the specified course.
   * 
   * GET /CourseUserTestAttempts/{CourseId},{UserId}
   * SDK: GetAPI('CourseUser')->GetTestAttemptsForCourse($courseId, $userId)
   * 
   * @since 1.0.4
   * 
   * @param mixed $courseId   (Required)  | The course identifier.
   * @param mixed $userId     (Required)  | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getTestAttemptsForCourse($courseId, $userId)
  {
    return $this->get()->GetAPI('CourseUser')->GetTestAttemptsForCourse($courseId, $userId);
  }

  /**
   * Returns the complete list of curriculums.
   * 
   * GET /curriculums
   * SDK: GetAPI('CurriculumList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllCurriculums()
  {
    return $this->get()->GetAPI('CurriculumList')->GetAll();
  }

  /**
   * Creates a relation between the requested user and curriculum.
   * 
   * PUT /Curriculum/{Id}/AddUser
   * SDK: GetAPI('CurriculumUser')->AddRelation($userId, $curriculumId, $force = false)
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId       (Required) | The user identifier.
   * @param mixed $curriculumId (Required) | The curriculum identifier.
   * @param bool  $force        (Required) | Whether to force the operation.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToCurriculum($userId, $curriculumId, $force = false)
  {
    return $this->get()->GetAPI('CurriculumUser')->AddRelation($userId, $curriculumId, $force);
  }

  /**
   * Removes the relation between the requested user and the curriculum.
   * 
   * PUT /Curriculum/{Id}/RemoveUser
   * SDK: GetAPI('CurriculumUser')->RemoveRelation($userId, $curriculumId)
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId       (Required) | The user identifier.
   * @param mixed $curriculumId (Required) | The curriculum identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function removeUserFromCurriculum($userId, $curriculumId)
  {
    return $this->get()->GetAPI('CurriculumUser')->RemoveRelation($userId, $curriculumId);
  }

  /**
   * Returns information about the extended profile fields for users.
   * 
   * GET /extended-fields/users
   * SDK: GetAPI('ExtendedProfile')->ForUsers()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getExtendedProfileFields()
  {
    return $this->get()->GetAPI('ExtendedProfile')->ForUsers();
  }

  /**
   * Returns information about the requested group.
   * 
   * GET /Group/{Id}
   * SDK: GetAPI('Group')->GetInfo($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The group identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getGroupById($id)
  {
    return $this->get()->GetAPI('Group')->GetInfo($id);
  }

  /**
   * Returns the complete list of groups.
   * 
   * GET /Groups
   * SDK: GetAPI('GroupList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllGroups()
  {
    return $this->get()->GetAPI('GroupList')->GetAll();
  }

  /**
   * Adds a user to a group.
   * 
   * POST /Group/AddUser
   * SDK: GetAPI('GroupUser')->AddRelation($groupId, $userId)
   * 
   * @since 1.0.4
   * 
   * @param mixed $groupId (Required) | The group identifier.
   * @param mixed $userId (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToGroup($groupId, $userId)
  {
    return $this->get()->GetAPI('GroupUser')->AddRelation($groupId, $userId);
  }

  /**
   * Creates a job.
   * 
   * POST /Job
   * SDK: GetAPI('Job')->Create(array $info)
   * 
   * @since 1.0.4
   * 
   * @param array $info | The job information to be used. (Required)
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function createJob(array $info)
  {
    return $this->get()->GetAPI('Job')->Create($info);
  }

  /**
   * Updates the requested job.
   * 
   * PUT /Job/{Id}
   * SDK: GetAPI('Job')->Update($id, array $info)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id | The job identifier to be used. (Required)
   * @param array $info | The job information to be used. (Required)
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function updateJob($id, array $info)
  {
    return $this->get()->GetAPI('Job')->Update($id, $info);
  }

  /**
   * Returns information about the requested job.
   * 
   * GET /Job/{Id}
   * SDK: GetAPI('Job')->GetInfo($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id | The job identifier to be used. (Required)
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getJobById($id)
  {
    return $this->get()->GetAPI('Job')->GetInfo($id);
  }

  /**
   * Returns the complete list of job.
   * 
   * GET /Jobs
   * SDK: GetAPI('JobList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllJobs()
  {
    return $this->get()->GetAPI('JobList')->GetAll();
  }

  /**
   * Returns a list of the available plugins and their information.
   * 
   * GET /Plugins
   * SDK: GetAPI('Plugin')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllPlugins()
  {
    return $this->get()->GetAPI('Plugin')->GetAll();
  }

  /**
   * Returns information about the requested plugin.
   * 
   * GET /Plugin/{pluginName}
   * SDK: GetAPI('Plugin')->GetInfo($pluginName)
   * 
   * @since 1.0.4
   * 
   * @param string $pluginName (Required) | The plugin name to retrieve its info.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getPluginByName($pluginName)
  {
    return $this->get()->GetAPI('Plugin')->GetInfo($pluginName);
  }

  /**
   * Posts the requested data to be used by the requested plugin.
   * 
   * POST /Plugin/{pluginName}
   * SDK: GetAPI('Plugin')->Notify($pluginName, array $data)
   * 
   * @since 1.0.4
   * 
   * @param string $pluginName (Required) | The plugin name to retrieve its info.
   * @param array  $data (Required) | The data to be send to the requested plugin.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function notifyPlugin($pluginName, $data)
  {
    return $this->get()->GetAPI('Plugin')->Notify($pluginName, $data);
  }

  /**
   * Returns the system information.
   * 
   * GET /System/Info
   * SDK: GetAPI('System')->GetInfo()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getSystemInfo()
  {
    return $this->get()->GetAPI('System')->GetInfo();
  }

  /**
   * Returns any available training session.
   * 
   * GET /training-sessions
   * SDK: GetAPI('TrainingSession')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllTrainingSessions()
  {
    return $this->get()->GetAPI('TrainingSession')->GetAll();
  }

  /**
   * Returns information about the requested training session.
   * 
   * GET /training-session/{id}
   * SDK: GetAPI('TrainingSession')->GetInfo($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The training session identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getTrainingSessionById($id)
  {
    return $this->get()->GetAPI('TrainingSession')->GetInfo($id);
  }

  /**
   * Returns a list of the users that belongs to the requested training session.
   * 
   * GET /training-session/{id}/users
   * SDK: GetAPI('TrainingSession')->GetUsers($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The training session identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getUsersOfTrainingSessionById($id)
  {
    return $this->get()->GetAPI('TrainingSession')->GetUsers($id);
  }

  /**
   * Activates the requested user.
   * 
   * PUT /User/{id}/Activate
   * SDK: GetAPI('User')->Activate($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function activateUser($id)
  {
    return $this->get()->GetAPI('User')->Activate($id);
  }

  /**
   * Auto-login the requested user.
   * 
   * GET /Autologin/{loginName}
   * SDK: GetAPI('User')->AutoLogin($loginName)
   * 
   * @since 1.0.4
   * 
   * @param string $loginName (Required) | The user's login name.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function autoLoginUser($loginName)
  {
    return $this->get()->GetAPI('User')->AutoLogin($loginName);
  }

  /**
   * Creates a user.
   * 
   * POST /User
   * SDK: GetAPI('User')->Create(array $userInfo)
   * 
   * @since 1.0.4
   * 
   * @param array $userInfo (Required) | The account information.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function createUser(array $userInfo)
  {
    return $this->get()->GetAPI('User')->Create($userInfo);
  }

  /**
   * Deactivates the requested user.
   * 
   * PUT /User/{id}/Deactivate
   * SDK: GetAPI('User')->Deactivate($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function deactivateUser($id)
  {
    return $this->get()->GetAPI('User')->Deactivate($id);
  }

  /**
   * Edits the requested user.
   * 
   * PUT /User/{id}
   * SDK: GetAPI('User')->Edit($id, array $userInfo)
   * 
   * @since 1.0.4
   * 
   * @param   mixed $id       (Required) | The user identifier.
   * @param   array $userInfo (Required) | The information to edit.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function updateUser($id, array $userInfo)
  {
    return $this->get()->GetAPI('User')->Edit($id, $userInfo);
  }

  /**
   * Returns information about the requested user.
   * 
   * GET /User/{id}
   * SDK: GetAPI('User')->GetInfo($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $id (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getUserById($id)
  {
    return $this->get()->GetAPI('User')->GetInfo($id);
  }

  /**
   * Log-out the requested user.
   * 
   * GET /Logout/{logoutName}
   * SDK: GetAPI('User')->Logout($loginName)
   * 
   * @since 1.0.4
   * 
   * @param string $loginName (Required) | The user's login name.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function logoutUser($loginName)
  {
    return $this->get()->GetAPI('User')->Logout($loginName);
  }

  /**
   * Creates a relation between the requested user and group.
   * 
   * PUT /Group/{Id}/AddUser
   * SDK: GetAPI('UserGroup')->AddRelation($userId, $groupId)
   * 
   * @since 1.0.4
   * 
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $groupId (Required) | The group identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToGroupViaPut($userId, $groupId)
  {
    return $this->get()->GetAPI('UserGroup')->AddRelation($userId, $groupId);
  }

  /**
   * Creates a relation between the requested user and job.
   * 
   * PUT /Job/{Id}/AddUser
   * SDK: GetAPI('UserJob')->AddRelation($userId, $jobId)
   * 
   * @since 1.0.4
   * 
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $jobId (Required) | The job identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToJob($userId, $jobId)
  {
    return $this->get()->GetAPI('UserJob')->AddRelation($userId, $jobId);
  }

  /**
   * Adds a user to a job via POST method.
   * 
   * POST /Job/AddUser
   * SDK: GetAPI('UserJob')->AddRelationWithPost($jobId, $userId)
   * 
   * @since 1.0.4
   * 
   * @param   mixed $jobId (Required) | The job identifier.
   * @param   mixed $userId  (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function addUserToJobViaPost($jobId, $userId)
  {
    return $this->get()->GetAPI('UserJob')->AddRelationWithPost($jobId, $userId);
  }

  /**
   * Removes the relation between the requested user and job.
   * 
   * PUT /Job/{Id}/RemoveUser
   * SDK: GetAPI('UserJob')->RemoveRelation($userId, $jobId)
   * 
   * @since 1.0.4
   * 
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $jobId (Required) | The job identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function removeUserFromJob($userId, $jobId)
  {
    return $this->get()->GetAPI('UserJob')->RemoveRelation($userId, $jobId);
  }

  /**
   * Returns information about user jobs.
   * 
   * GET /User/{Id}/Jobs
   * SDK: GetAPI('UserJob')->GetInfoAboutJobs($id)
   * 
   * @since 1.0.4
   * 
   * @param mixed $userId (Required) | The user identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getJobsForUserById($userId)
  {
    return $this->get()->GetAPI('UserJob')->GetInfoAboutJobs($userId);
  }

  /**
   * Returns the complete user list.
   * 
   * GET /Users
   * SDK: GetAPI('UserList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllUsers()
  {
    return $this->get()->GetAPI('UserList')->GetAll();
  }

  /**
   * Returns any user with the requested email as email.
   * 
   * GET /Users/{eMailAddress}
   * SDK: GetAPI('UserList')->GetAllByMail($mail)
   * 
   * @since 1.0.4
   * 
   * @param string $mail (Required) | The email identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllUsersByMail($mail)
  {
    return $this->get()->GetAPI('UserList')->GetAllByMail($mail);
  }

  /**
   * Returns information about the requested user type.
   * 
   * GET /user-type/{id}
   * SDK: GetAPI('UserType')->GetInfo($id)
   * 
   * @since 1.0.4
   * 
   * @param   mixed $id (Required) | The user type identifier.
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getUserTypeById($id)
  {
    return $this->get()->GetAPI('UserType')->GetInfo($id);
  }

  /**
   * Returns the complete user list.
   * 
   * GET /user-types
   * SDK: GetAPI('UserTypeList')->GetAll()
   * 
   * @since 1.0.4
   * 
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function getAllUserTypes()
  {
    return $this->get()->GetAPI('UserTypeList')->GetAll();
  }
}