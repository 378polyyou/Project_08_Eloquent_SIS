export default function Index({employees}){
    return(
        <div>
        <h1>
            Employees List
        </h1>
        <ul>
                {employees.map((employee, index) => (
                    <li key={index}>
                        {employee.first_name}
                    </li>
                ))}
            </ul>
      
        </div>
    )
}