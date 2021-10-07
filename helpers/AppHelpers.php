<?php

namespace app\helpers;


use app\models\Appointments;
use app\models\AuthAssignment;
use app\models\BlogAuthors;
use app\models\BlogCategories;
use app\models\Blogs;
use app\models\Doctors;
use app\models\DoctorTiming;
use app\models\Pages;
use app\models\Testimonies;
use yii\data\Sort;
use yii\helpers\ArrayHelper;

class AppHelpers
{
    public static function getBlogCategories() {

        $model = BlogCategories::findAll(['is_deleted' => 0, 'is_active' => 1]);
        return ArrayHelper::map($model, 'blog_category_id', 'name');
    }

    public static function getBlogCategoriesWithCount() {

        $model = BlogCategories::findAll(['is_deleted' => 0, 'is_active' => 1]);
        $blogCategoryList = [];
        foreach ($model as $category) {
            $count = count($category->blogs);
            $blogCategoryList[] = [
                "id" => $category->blog_category_id,
                "name" => "$category->name",
                "count" => $count
            ];
        }
        return $blogCategoryList;
    }

    public static function getPopularBlog($limit = 3) {

        /* @var $model Blogs[] */
        $model = Blogs::find()
            ->where(['is_deleted' => 0, 'is_active' => 1, 'is_featured' => 1])
            ->limit($limit)
            ->all();
        $blogsLost = [];
        foreach ($model as $blog) {
            $blogsLost[] = [
                "id" => $blog->blog_id,
                "title" => $blog->title,
                "image" => "@web/uploads/$blog->image",
                "date" => $blog->created_at,
                'content' => $blog->content,
                'author' => ($blog->author)? $blog->author->name : ''
            ];
        }
        return $blogsLost;
    }

    /**
     * @param int $blog_category_id
     * @param int $current_blog_id
     * @param int $limit
     * @return Blogs[]
     */
    public static function getResentBlog($blog_category_id, $current_blog_id, $limit = 2) {

        /* @var $model Blogs[] */
        return Blogs::find()
            ->where(['is_deleted' => 0, 'is_active' => 1, 'blog_category_id' => $blog_category_id])
            ->andWhere(['!=', 'blog_id', $current_blog_id])
            ->limit($limit)
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
    }

    /**
     * @param int $limit
     * @return Blogs[]
     */
    public static function getLatestBlogs($limit = 1)
    {
        /* @var $model Blogs[] */
        return Blogs::find()
            ->where(['is_deleted' => 0, 'is_active' => 1])
            ->limit($limit)
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
    }

    public static function getBlogAuthors() {

        $model = BlogAuthors::findAll(['is_deleted' => 0, 'is_active' => 1]);
        return ArrayHelper::map($model, 'author_id', 'name');
    }

    public static function getTestimonies() {

        return Testimonies::findAll(['is_deleted' => 0, 'is_active' => 1]);
    }

    public static function getFeaturedDoctors() {

        return Doctors::find()
            ->where(['is_deleted' => 0, 'is_active' => 1, 'is_featured' => 1])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();
    }

    public static function getDoctors() {

        $doctors = Doctors::findAll(['is_deleted' => 0, 'is_active' => 1]);
        return ArrayHelper::map($doctors, 'doctor_id', 'name');
    }

    public static function generateAppointmentNo() {

        /* @var $appointments Appointments */
        $appointments = Appointments::find()->orderBy(['appointment_id' => SORT_DESC])->one();
        if($appointments) {
            $id = $appointments->appointment_id;
            $appointment_code = 100000 + ($id + 1);
        }
        else {
            $appointment_code = 100001;
        }
        return (string) $appointment_code;
    }

    /**
     * @return Pages[]
    */
    public static function getPagesMenu() {

        return Pages::find()
            ->where(['show_in_menu' => 1])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();
    }

    public static function getUserAuthItems($user_id, $user_type = 'A') {

        /* @var $userPermissions AuthAssignment[] */
        $userPermissions = \app\models\AuthAssignment::find()
            ->select(['auth_item_id'])
            ->where(['user_id' => $user_id])
            ->andWhere(['user_type' => $user_type])
            ->all();

        $permissions = [];

        foreach ($userPermissions as $permission) {
            $permissions[] = $permission->auth_item_id;
        }

        return $permissions;
    }

    public static function getDoctorTimingList($doctor_id, $date = null, $is_booked = [0, 1])
    {
        if($date == null) {
            $date = date('Y-m-d');
        }
        $doctorTiming = DoctorTiming::findAll(['doctor_id' => $doctor_id, 'is_deleted' => 0, 'is_booked' => $is_booked, 'date' => $date]);
        $doctorTimingList = [];
        foreach ($doctorTiming as $timing) {
            $doctorTimingList[$timing->doctor_timing_id] = date('h:i A', strtotime($timing->start_time)) . ' to ' . date('h:i A', strtotime($timing->end_time));
        }
        return $doctorTimingList;
    }

    public static function formatDateTime($datetime, $datetime_format = 'd M Y, h:i A') {

        if(date('h:i A', strtotime($datetime)) == '12:00 AM') {
            return date('d M Y', strtotime($datetime));
        }
        else {
            return date($datetime_format, strtotime($datetime));
        }
    }

    static function convertTimezone($datetime, $format = 'd M Y, h:i:s A') {
        $timeZone = \Yii::$app->params['timezone'];
        $newTimeZone = new \DateTimeZone($timeZone);
        $dateTime = new \DateTime($datetime, new \DateTimeZone('UTC'));
        $dateTime->setTimezone($newTimeZone);
        return $dateTime->format($format);
    }
}
