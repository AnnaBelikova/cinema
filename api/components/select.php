<?php

	class Select {

		private $from;
		private $what = '*';
		private $join = '';
		private $where = '';
		private $having = '';
		private $groupBy = '';
		private $sort = '';
		private $limit = '';

		public function __construct($from) {
			$this->from = $from;
			return $this;
		}

		// what('author_id', 'author_name') => SELECT `author_id`, `author_name`, 
		// what('id' => 'author_id', 'name' => 'author_name') => SELECT `author_id` AS `id`, `author_name` AS `name`
		public function what($array) {
			$str = '';
			foreach ($array as $alias => $name) {
				if (is_numeric($alias)) {
					$str .= " $name,";
				} else {
					$str .= " $name AS $alias,";
				}
			}
			$str = rtrim($str, ',');
			$this->what = $str;
			return $this;
		}

		/* 
			join([
					[
						'type' => 'LEFT',
						'table' => 'authors',
						'key1' => 'author_id',
						'key2' => 'book_author_id'
					],
					[],
					[]
				])

		*/
		public function join($array) {
			$str = '';
			foreach ($array as $join) {
				$str .= " $join[type] JOIN $join[table] ON $join[key1] = $join[key2]";
			}
			$this->join = $str;
			return $this;
		}
		// TODO: Необходимо переписать логику метода, чтобы в качестве where передавалась не строка,а некоторый массив
		// TODO: ('AND' => array('author_id', '5'));
		// текущая реализация: $where = "WHERE `author_id` = 5";
		public function where($where) {
			$this->where = $where;
			return $this;
		}

		// TODO: см. TODO where блока
		public function having($having) {
			$this->having = $having;
			return $this;
		}

		public function groupBy($groupBy) {
			$str = "GROUP BY $groupBy";
			$this->groupBy = $str;
			return $this;
		}

		// $sort = array('name' => 'author_name', 'direction' => 'ASC') => "ORDER BY $name $direction"
		public function sort($sort) {
			$str = "ORDER BY $sort[name] $sort[direction]";
			$this->sort = $str;
			return $this;
		}

		// $limit = array('count' => 3, 'offset' => 4 | 0) => "LIMIT $offset, $count";

		public function limit($count, $offset = 0) {
			$str = "LIMIT $offset, $count";
			$this->limit = $str;
			return $this;
		}

		public function build() {
			$str = "
				SELECT {$this->what}
				FROM {$this->from}
				{$this->join}
				{$this->where}
				{$this->groupBy}
				{$this->having}
				{$this->sort}
				{$this->limit}
			";
			return $str;
		}
	}