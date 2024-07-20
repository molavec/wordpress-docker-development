path=$(printf '%s\n' "${PWD##*/}")
command="docker-compose exec wordpress php "$@""
echo "Running php on docker wordpress"
$command