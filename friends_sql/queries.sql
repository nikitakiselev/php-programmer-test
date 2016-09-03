/* Get contacts, having more 5 friends */
select c.name
from friends as f
join contacts as c on c.id = f.user_id
group by user_id 
having count(user_id) > 5;

/* Get mutual friends */
select c1.name as initial_name, c2.name as friend_name 
from friends as f
join contacts as c1 on c1.id = f.user_id
join contacts as c2 on c2.id = f.friend_id
where mutual is true;